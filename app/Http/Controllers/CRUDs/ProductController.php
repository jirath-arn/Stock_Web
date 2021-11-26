<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use PhpParser\Node\Stmt\Foreach_;


class ProductController extends Controller
{
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

    public function show($product)
    {
        $product_detail = ProductDetail::all()->where('product_code_name',$product);
        $total_amount = 0;
        $balance_amount = 0;
        $Image = Image::all()->where('product_code_name',$product);
        foreach($product_detail as $item){
            $total_amount +=  $item->total_amount;
        }
        
        foreach($product_detail as $item){
            $balance_amount +=  $item->balance_amount;
        }

        $data = [$product_detail,$total_amount,$balance_amount,$Image];
        return view('detail',compact('data'));
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
        
        
        
        dd(strlen($request->base64));

        $product = new Product();
        $product->code_name = $request->code_name;
        $product->product_name = $request->product_name;
        $product->category_id = $request->category;
        $product->wholesale_price = $request->price;
        // $product->save();
        
        
        
        for($i = 0; $i < count($request->color); $i++){
            $product_detail = new ProductDetail();
            $product_detail->product_code_name = $request->code_name;
            $product_detail->product_color = $request->color[$i];
            $product_detail->product_size = $request->size[$i];
            $product_detail->balance_amount = $request->quantity[$i];
            $product_detail->total_amount = $request->quantity[$i];
            
        }

        $image = new Image();
        $image->product_code_name = $request->code_name;

        if($request->hasFile($request->image)){
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $image->filename = $filename;
            
        }else{
            $filename =' ';
        }
        
        $image->size = 0;    
        $file->move('img/test-shirt/', $filename);
            
        
            
        
        
        // $product_detail->save();
        // $image->save();
        
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        // abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function update(Request $request, $id)
    {
        // Code..
    }

    public function destroy(Product $product)
    {
        // abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
