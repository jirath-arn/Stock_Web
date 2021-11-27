<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.newStock');
    }
    public function show()
    {
        return view('detail');
    }
    public function history()
    {
        return view('admin.history');
    }
    public function category()
    {
        return view('admin.newCategory');
    }
    public function dashboard()
    {
        return redirect()->route('dashboard.index');
    
    }
}
