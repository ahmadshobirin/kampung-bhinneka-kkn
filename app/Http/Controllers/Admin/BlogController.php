<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::latest()->paginate(10);

        return view('admin.pages.blog.index', [ 
            "data" => $data
        ]);
    }

    public function create()
    {
        $category = Category::orderBy('name', 'asc')->get();

        return view('admin.pages.blog.create', [ 
            "category" => $category
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
