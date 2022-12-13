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
        $request->validate([
            "name" => "required|string|unique:categories",
        ]);

        try {
            Category::create($request->except("_token"));
            return redirect()->route("category.index")->with('success', 'Data kategori berhasil ditambahkan!');
        } catch(\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->with('error_msg', 'Data kategori gagal ditambahkan!');
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
        $request->validate([
            "name" => "required|string|unique:categories,id," . $id,
        ]);

        try {
            $category = Category::find($id);
            $category->update($request->except('_token'));
            return redirect()->route("category.index")->with('success', 'Data kategori berhasil diubah!');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->with('error_msg', 'Data kategori gagal diubah!');
        }
    }

    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil Dihapus!.',
        ]);
    }

}
