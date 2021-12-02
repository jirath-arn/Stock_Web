<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use Illuminate\Support\Arr;
use JavaScript;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Image;

class ProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all();
        $products = Product::all();
        $products_balance = array();

        foreach($products as $key => $product) {
            $balance = 0;
            foreach($product->product_details as $key => $detail) {
                $balance += $detail->balance_amount;
            }
            $products_balance = Arr::add($products_balance, $product->code_name, $balance);
        }

        return view('cruds.products.index', compact('products', 'categories', 'products_balance'));
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_balance = 0;
        $total_amount = 0;

        foreach($product->product_details as $key => $detail) {
            $product_balance += $detail->balance_amount;
            $total_amount += $detail->total_amount;
        }

        JavaScript::put([
            'product_details' => $product->product_details,
        ]);

        return view('cruds.products.show', compact('product', 'product_balance', 'total_amount'));
    }
    
    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all();

        return view('cruds.products.create', compact('categories'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'product_name' => 'required|max:255',
            'code_name' => 'required|max:10',
            'category' => 'required',
            'price' => 'required|min:0',
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required',
            'base64' => 'required',
        ]);

        // Add Product.
        $product = new Product();
        $product->code_name = $request->code_name;
        $product->product_name = $request->product_name;
        $product->category_id = $request->category;
        $product->wholesale_price = $request->price;
        $product->save();
        
        // Add Product_Detail.
        for($i = 0; $i < count($request->color); $i++){
            $product_detail = new ProductDetail();
            $product_detail->product_code_name = $request->code_name;
            $product_detail->product_color = $request->color[$i];
            $product_detail->product_size = $request->size[$i];
            $product_detail->balance_amount = $request->quantity[$i];
            $product_detail->total_amount = $request->quantity[$i];
            $product_detail->save();
        }
        
        $image = new Image();
        $image->product_code_name = $request->code_name;
         
        $mime = substr($request->base64, 0, strpos($request->base64, ",") + 1);
        $image->mime = $mime;

        $base64 = substr($request->base64, strpos($request->base64, ",") + 1, -1);
        $image->base64 = $base64;
        $image->save();

        $product_info = $request->code_name.' '.$request->product_name;

        return redirect(route('products.index'))->with(['header' => 'สำเร็จ!', 'message' => 'สร้างรายการสินค้า "'.$product_info.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }

    public function update(Request $request, $code_name)
    {
        if(empty($request->select_list_reduce) && empty($request->select_list_add)) {
            return redirect(route('products.show', $code_name))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'กรุณาเลือกรายการที่ต้องการก่อน', 'alert' => 'danger']);
        
        } else if(empty($request->number_add) && empty($request->number_reduce)) {
            return redirect(route('products.show', $code_name))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'กรุณากรอกจำนวนก่อน', 'alert' => 'danger']);
        }

        $id_detail = (isset($request->select_list_add)) ? $request->select_list_add : $request->select_list_reduce;

        $product_detail = ProductDetail::find($id_detail);
        $balance_amount = $product_detail->balance_amount;
        $total_amount = $product_detail->total_amount;

        if(isset($request->number_add)) {
            $number_add = (int)$request->number_add;

            if($number_add < 1) {
                return redirect(route('products.show', $code_name))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'จำนวนเพิ่มสินค้าต้องเป็นตัวเลขตั้งแต่ 1 เป็นต้นไป', 'alert' => 'danger']);
            }

            $product_detail->balance_amount = $balance_amount + $number_add;
            $product_detail->total_amount = $total_amount + $number_add;

        } else {
            $number_reduce = (int)$request->number_reduce;

            if($number_reduce < 1) {
                return redirect(route('products.show', $code_name))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'จำนวนลดสินค้าต้องเป็นตัวเลขตั้งแต่ 1 เป็นต้นไป', 'alert' => 'danger']);
            
            } else if($balance_amount < $number_reduce) {
                return redirect(route('products.show', $code_name))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'จำนวนลดสินค้ามากกว่าจำนวนคงเหลือที่มีอยู่', 'alert' => 'danger']);
            }

            $product_detail->balance_amount = $balance_amount - $number_reduce;
        }

        $product_detail->save();
        
        return redirect(route('products.show', $code_name))->with(['header' => 'สำเร็จ!', 'message' => 'ทำรายการเรียบร้อยแล้ว', 'alert' => 'success']);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_info = 'รหัส '.$product->code_name.' ('.$product->product_name.')';

        $product->product_details()->delete();
        $product->images()->delete();
        $product->delete();
        
        return redirect(route('products.index'))->with(['header' => 'สำเร็จ!', 'message' => 'ลบรายการสินค้า "'.$product_info.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }
}
