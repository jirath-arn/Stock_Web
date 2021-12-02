<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;

use App\Models\ProductDetail;

class ProductDetailController extends Controller
{
    public function destroy(ProductDetail $product_detail)
    {
        abort_if(Gate::denies('product_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $code_name = $product_detail->product_code_name;
        $detail = $product_detail->product_color.' , '.$product_detail->product_size;

        $product_detail->delete();

        return redirect(route('products.show', $code_name))->with(['header' => 'สำเร็จ!', 'message' => 'ลบรายละเอียด "'.$detail.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }
}
