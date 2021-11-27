<?php

namespace App\Http\Controllers;
use App\Http\Controllers\CRUDs\ProductController;
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
        return redirect()->route('products.index');
    }
}
