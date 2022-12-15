<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::with('user', 'category')->latest()->paginate(10);


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

    private function collectImageAndThumbnail(Request $request)
    {
        if (!$request->hasFile('image_upload')) {
            return $request;
        }

        $imagesUpload = $request->file('image_upload');
        $folder = public_path() . '/uploads/blog';
        $folderThumbnail = public_path() . '/uploads/blog/thumbnail';
        $path = $folder.'/'.$imagesUpload->getClientOriginalName();

        $imagesUpload = $request->file('image_upload');
        $folder = public_path() . '/uploads/blog';
        $folderThumbnail = public_path() . '/uploads/blog/thumbnail';
        $path = $folder.'/'.$imagesUpload->getClientOriginalName();

        if(!File::exists( public_path() . '/uploads')){
            if (!File::exists($folder)) {
                File::makeDirectory($folder);
            }
            if (!File::exists($folderThumbnail)) {
                File::makeDirectory($folderThumbnail);
            }
        }

        Image::make($imagesUpload)->save($folder.'/'.$imagesUpload->getClientOriginalName());
        Image::make($imagesUpload)->save($folderThumbnail.'/'.$imagesUpload->getClientOriginalName())->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $request->merge([
            'image' => "/uploads/blog/".$imagesUpload->getClientOriginalName(),
            'thumbnail' => "/uploads/blog/thumbnail/".$imagesUpload->getClientOriginalName(),
        ]);

        return $request;
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"        => "required|string|unique:blogs",
            "description"  => "required",
            "image_upload" => "required|image|mimes:jpeg,png,jpg,gif|max:1024",
            "category_id"  => "required"
        ]);

        $this->collectImageAndThumbnail($request);

        $request->merge([
            "user_id"       => Auth::user()->id,
            "slug"          => Str::slug($request->title),
            "short_desc"    => ($request->short_desc == null) ? Str::limit(strip_tags($request->description), 150, '...') : $request->short_desc
        ]);

        try{
            Blog::create($request->except("_token", "image_upload"));
            return redirect()->route('blog.index')->with('success', 'Data Berita berhasil ditambahkan!');
        } catch (\Exception $e) {
            logger()->error("error creating blog: ".$e->getMessage());
            return redirect()->back()->with('error_msg', 'Data Berita gagal ditambahkan!');
        }
    }

    public function edit($id)
    {
        $category = Category::get();
        $data = Blog::where("id", $id)->firstOrFail();

        return view('admin.pages.blog.edit', [ 
            "data"     => $data,
            "category" => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title"        => "required|string|unique:blogs,title,".$id,
            "description"  => "required",
            "image_upload" => "required|image|mimes:jpeg,png,jpg,gif|max:1024",
            "category_id"  => "required"
        ]);

        $this->collectImageAndThumbnail($request);

        try {
            Blog::where('id', $id)->update($request->except("_token", "_method", "image_upload"));
            return redirect()->route('blog.index')->with('success', 'Data Berita berhasil diubah!');
        } catch(\Exception $e) {
            logger()->error("error updating blog: ".$e->getMessage());
            return redirect()->route('blog.index')->with('error_msg', 'Data Berita gagal diubah!');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            Blog::where('id',$id)->delete();
            
            return response(['message' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return response(['message' => 'Data Gagal dihapus.']);
        }
    }
}
