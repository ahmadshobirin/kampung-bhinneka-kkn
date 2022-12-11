<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();

        return view('admin.pages.master.category.index', [ 
            "data" => $data
        ]);
    }

    public function create()
    {
        return view('admin.pages.master.category.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|string|unique:categories,id",
            ]);
    
            Category::create($request->except("_token"));
            return redirect()->route("category.index")->with('success', 'Data kategori berhasil ditambahkan!');
        } catch(\Exception $e) {
            return redirect()->route("category.index")->with('error_msg', 'Data kategori gagal ditambahkan!');
        }
    }

    public function edit($id)
    {
        $data = Category::where("id", $id)->firstOrFail();

        return view('admin.pages.master.category.edit', [
            "data" => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                "name" => "required|string|unique:categories,id," . $id,
            ]);
            
            $category = Category::find($id);
            if (strtolower($category->name) != strtolower($request->name)){
                BlogCategory::where("category_id", $id)->update(['category' => $request->name]);
            }
    
            $category->update($request->except('_token'));
            return redirect()->route("category.index")->with('success', 'Data kategori berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->route("category.index")->with('error_msg', 'Data kategori gagal diubah!');
        }
    }

    public function destroy($id)
    {
        $used = BlogCategory::where('category_id', $id)->count();
        if ($used != 0){
            return redirect()->back()->with('message', 'Data sedang dipakai untuk sementara tidak bisa dihapus. <br> Silakan cek kembali');
        }

        Category::where('id',$id)->delete();
        return redirect()->route("category.index");
    }

}
