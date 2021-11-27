<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $product = Product::all();
        $product_detail = ProductDetail::all();
        $array_balance = array();
        $array_total = array();
        $balance = 0;
        $total= 0;
        foreach($product as $p){
            foreach($product_detail as $d){
                if($p->code_name == $d->product_code_name){
                   $balance += $d->balance_amount;
                }
            }
            array_push($array_balance,$balance);
            $balance = 0 ;

            foreach($product_detail as $t){
                if($p->code_name == $t->product_code_name){
                   $total += $t->total_amount;
                }
            }
            array_push($array_total,$total);
            $total = 0 ;
            
           
        }
        
        

        $data = [$product,$array_balance,$array_total];

        return view('admin.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
