<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $image = Image::all();
        $array_image = array();
        $product_detail = ProductDetail::all();
        $array_number = array();
        $balance = 0;
        foreach($product as $p){
            foreach($product_detail as $d){
                if($p->code_name == $d->product_code_name){
                   $balance += $d->balance_amount;
                }
            }
            array_push($array_number,$balance);
            $balance = 0 ;

            foreach($image as $i){
                if($i->product_code_name == $p->code_name){
                    array_push($array_image,$i->filename);
                 }
            }
           
        }
        
        $data = [$product,$array_number,$category,$array_image];
        return view('home', compact('data'));
    }
}
