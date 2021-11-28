<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use Illuminate\Support\Arr;

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

    public function show($code_name)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::where('code_name', $code_name)->first();
        $product_balance = 0;
        $total_amount = 0;

        foreach($product->product_details as $key => $detail) {
            $product_balance += $detail->balance_amount;
            $total_amount += $detail->total_amount;
        }

        return view('cruds.products.show', compact('product', 'product_balance', 'total_amount'));
    }
    
    public function create()
    {
        $data = Category::all();
        return view('admin.newStock', compact('data'));
    }

    public function store(Request $request)
    {   
        // $data=$request->all();
        
        // $img = file_get_contents($request->image);
        // dd(base64_encode($img));
        // data:image/jpeg;base64,
        $request->validate([
            'product_name' => 'required',
            'code_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => '',
            'color' => '',
            'size' => '',
            'quantity' => '',
            'base64' => ''
        ]);
        
        
        
        // dd(strlen($request->base64));

        $product = new Product();
        $product->code_name = $request->code_name;
        $product->product_name = $request->product_name;
        $product->category_id = $request->category;
        $product->wholesale_price = $request->price;
        $product->save();
        
        
        
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
         
        
        $mime = substr( $request->base64, 0, strpos($request->base64,",")+1);
        $image->mime = $mime;   

        $base64 = substr( $request->base64,strpos($request->base64,",")+1,-1);
        $image->base64 = $base64;
        
        
          
        
        $image->save();
        
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        // abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function update(Request $request, $code_name)
    {
        if(empty($request->select_list_reduce) && empty($request->select_list_add)) {
            return redirect(route('products.show', $code_name));
        }

        $id_detail = (isset($request->select_list_add)) ? $request->select_list_add : $request->select_list_reduce;

        $product_detail = ProductDetail::find($id_detail);
        $balance_amount = $product_detail->balance_amount;
        $total_amount = $product_detail->total_amount;

        if(isset($request->number_add)) {
            $product_detail->balance_amount = $balance_amount + (int)$request->number_add;
            $product_detail->total_amount = $total_amount + (int)$request->number_add;

        } else {
            if($balance_amount < (int)$request->number_reduce) {
                return redirect(route('products.show', $code_name));
            }

            $product_detail->balance_amount = $balance_amount - (int)$request->number_reduce;
        }

        $product_detail->save();
        
        return redirect(route('products.show', $code_name));
    }

    public function destroy(Product $product)
    {
        // abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
