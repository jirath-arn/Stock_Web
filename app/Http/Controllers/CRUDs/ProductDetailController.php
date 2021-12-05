<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use Auth;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\HistoryTransaction;

class ProductDetailController extends Controller
{
    public function update(Request $request, $code_name)
    {
        if(empty($request->price_new)) {
            return redirect(route('products.show', $code_name))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'กรุณากรอกราคาใหม่ก่อน', 'alert' => 'danger']);
        
        }else if((int)$request->price_new < 0) {
            return redirect(route('products.show', $code_name))->with(['header' => 'ไม่สำเร็จ!', 'message' => 'ราคาส่งไม่สามารถติดลบได้', 'alert' => 'danger']);
        }

        $product = Product::find($code_name);
        
        if($request->price_new == $product->wholesale_price) {
            return redirect(route('products.show', $code_name))->with(['header' => 'เตือน!', 'message' => 'ไม่สามารถแก้ไขราคาส่งเท่าเดิมได้', 'alert' => 'warning']);
        }

        $product_info = $product->code_name.' ('.$product->product_name.') จาก "'.number_format($product->wholesale_price).'" เปลี่ยนเป็น "'.number_format($request->price_new).'"';

        $product->wholesale_price = $request->price_new;

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการแก้ไขราคาส่งสินค้า รหัส '.$product_info;

        $product->save();
        $history->save();
        
        return redirect(route('products.show', $code_name))->with(['header' => 'สำเร็จ!', 'message' => 'แก้ไขราคาส่งเรียบร้อยแล้ว', 'alert' => 'success']);
    }

    public function destroy(ProductDetail $product_detail)
    {
        abort_if(Gate::denies('product_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $code_name = $product_detail->product_code_name;
        $detail = $product_detail->product_color.' , '.$product_detail->product_size;

        $product_detail->delete();

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการลบรายละเอียด รหัส '.$code_name.' -> "'.$detail.'"';
        $history->save();

        return redirect(route('products.show', $code_name))->with(['header' => 'สำเร็จ!', 'message' => 'ลบรายละเอียด "'.$detail.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }
}
