<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function show(Product $product)
    {
        // abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
    
    public function create()
    {
        // abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function store(Request $request)
    {
        // Code..
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
