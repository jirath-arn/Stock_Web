<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('admin.newCategory', compact('data'));
    }

    public function show(Category $category)
    {
        // abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
    
    public function create()
    {
        // abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => '',
        ]);

        $category = new Category();
        $category->title = $request->category_name;

        $category->save();
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $data = Category::find($category);
        return view('admin.editCategory',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'new_category_name' => "",
            
        ]);
        
        $userEdit = Category::find($id);
        $userEdit->title = $request->new_category_name;
        $userEdit->save();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        //
    }
}
