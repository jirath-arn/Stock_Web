<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use Illuminate\Support\Arr;
use JavaScript;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products_balance = array();
        $products_total = array();

        foreach($products as $key => $product) {
            $balance = 0;
            $total = 0;

            foreach($product->product_details as $key => $detail) {
                $balance += $detail->balance_amount;
                $total += $detail->total_amount;
            }

            $products_balance = Arr::add($products_balance, $product->code_name, $balance);
            $products_total = Arr::add($products_total, $product->code_name, $total);
        }

        JavaScript::put([
            'products' => $products,
            'products_balance' => $products_balance,
            'products_total' => $products_total,
        ]);

        return view('cruds.dashboards.index');
    }
}
