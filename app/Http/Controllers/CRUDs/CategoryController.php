<?php

namespace App\Http\Controllers\CRUDs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Gate;
use Auth;

use App\Models\Category;
use App\Models\HistoryTransaction;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all();

        return view('cruds.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:100',
        ]);

        $category = new Category();
        $category->title = $request->category_name;
        $category->save();

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการสร้างหมวดหมู่ใหม่ "'.$request->category_name.'"';
        $history->save();

        return redirect(route('categories.index'))->with(['header' => 'สำเร็จ!', 'message' => 'สร้างหมวดหมู่ใหม่เรียบร้อยแล้ว', 'alert' => 'success']);
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('cruds.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'new_category_name' => 'required|max:100|unique:categories,title',
        ]);

        $category = Category::find($id);

        $category_info = $category->title.'" เปลี่ยนเป็น "'.$request->new_category_name;

        $category->title = $request->new_category_name;
        $category->save();

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการแก้ไขหมวดหมู่จาก "'.$category_info.'"';
        $history->save();

        return redirect(route('categories.index'))->with(['header' => 'สำเร็จ!', 'message' => 'แก้ไขหมวดหมู่จาก "'.$category_info.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category_info = $category->title;

        foreach($category->products as $key => $product) {
            $product->product_details()->delete();
            $product->images()->delete();
            $product->delete();
        }

        $category->delete();

        $auth = Auth::user();
        $history = new HistoryTransaction();
        $history->detail = $auth->name.' ทำการลบหมวดหมู่ "'.$category_info.'"';
        $history->save();
        
        return redirect(route('categories.index'))->with(['header' => 'สำเร็จ!', 'message' => 'ลบหมวดหมู่ "'.$category_info.'" เรียบร้อยแล้ว', 'alert' => 'success']);
    }
}
