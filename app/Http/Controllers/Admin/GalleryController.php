<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::all();

        return view('admin.pages.gallery.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pages.gallery.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'title'         => 'required|min:5',
            'image_upload'  => 'required|file|mimes:jpeg,png,jpg,svg|max:1024',
            'description'   => 'required|min:5'
        ]);

        $upload = $this->handleUpload();
        if (!$upload) {
            return redirect()->back()->with('error', 'Data gagal ditambahkan.');
        }

        $req->merge([
            "image"         => $upload['filename'],
            "thumbnail"     => $upload['filename'],
            "created_by"    => Auth::user()->name,
            "created_by_id" => Auth::user()->id,
        ]);

        Gallery::create($req->except("_token", "image_upload"));

        return redirect()->route('gallery.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $req, $id)
    {
        $validation = [
            'title'         => 'required|min:5',
            'description'   => 'required|min:5'
        ];
        if ($req->file('image_upload')) {
            $validation = array_merge($validation, [
                'image_upload'  => 'required|file|mimes:jpeg,png,jpg,svg,pdf,doc,docx,xls,xlsx|max:10000'
            ]);
        }
        $req->validate($validation);

        if ($req->file('image_upload')) {
            $upload = $this->handleUpload();
            $req->merge([
                "image"         => $upload['filename'],
                "thumbnail"     => $upload['filename'],
            ]);
            if (!$upload) {
                return redirect()->back()->with('error', 'Data gagal ditambahkan.');
            }
        }

        $req->merge([
            "created_by"    => Auth::user()->name,
            "created_by_id" => Auth::user()->id,
        ]);

        Gallery::where('id', $id)->update($req->except("_token", "_method", "image_upload"));

        return redirect()->route('gallery.index')->with('success', 'Data berhasil dipudate.');
    }

    public function edit(Request $request, $id)
    {
        $data = Gallery::orderBy('id', 'desc')->where('id', $id)->firstOrFail();

        return view('admin.pages.gallery.edit')->with('data', $data);
    }

    public function destroy(Request $request, $id)
    {
        try {
            Gallery::where('id', $id)->delete();

            return response(['message' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return response(['message' => 'Data Gagal dihapus.']);
        }
    }

    private function handleUpload()
    {
        $req = app()->request;
        $file       = $req->file('image_upload');
        $path       = public_path() . "/uploads/galleries";
        $filename   = uniqid() . date('Yds') . "_" . $file->getClientOriginalName();
        $pathThumb  = public_path() . "/uploads/galleries/thumbnail";

        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        if (!File::exists($pathThumb)) {
            File::makeDirectory($pathThumb);
        }
        Image::make($file)->save($path . '/' . $filename);
        Image::make($file)->save($pathThumb . '/' . $filename)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return [
            'filename' => $filename
        ];
    }
}
