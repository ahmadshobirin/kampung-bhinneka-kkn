<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Demografi;
use App\Models\MicroSmallAndMediumEnterprise as MSMEs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MSMEsController extends Controller
{
    public function index()
    {
        $data = MSMEs::with('demografi')->paginate(10);

        return view("admin.pages.umkm.index", [ "data" => $data ]);
    }

    public function create()
    {
        $data = Demografi::get();

        return view("admin.pages.umkm.create", [ "data" => $data ]);
    }


    private function collectImageAndThumbnail(Request $request)
    {
        if (!$request->hasFile('image_upload')) {
            return $request;
        }

        $imagesUpload = $request->file('image_upload');
        $folder = public_path() . '/uploads/umkm';
        $folderThumbnail = public_path() . '/uploads/umkm/thumbnail';
        $path = $folder.'/'.$imagesUpload->getClientOriginalName();

        $imagesUpload = $request->file('image_upload');
        $folder = public_path() . '/uploads/umkm';
        $folderThumbnail = public_path() . '/uploads/umkm/thumbnail';
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
            'image' => "/uploads/umkm/".$imagesUpload->getClientOriginalName(),
            'thumbnail' => "/uploads/umkm/thumbnail/".$imagesUpload->getClientOriginalName(),
        ]);

        return $request;
    }

    public function store(Request $request)
    {
        $request->validate([
            "nib"           => "numeric|digits_between:10,20|nullable",
            "demografis_id" => "required",
            "name"          => "required|string|unique:micro_small_and_medium_enterprises,id",
            "address"       => "required|string",
            "description"   => "required",
            "business_type" => "required",
            "image_upload"  => "image|mimes:jpeg,png,jpg,gif|max:1024|nullable",
        ]);

        $this->collectImageAndThumbnail($request);

        $request->merge([
            "user_id"       => Auth::user()->id,
            "slug"          => Str::slug($request->title),
            "short_desc"    => ($request->short_desc == null) ? Str::limit(strip_tags($request->description), 150, '...') : $request->short_desc
        ]);

        try {
            MSMEs::create($request->except("_token"));
            return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil ditambahkan!');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->with('error_msg', 'Data UMKM gagal ditambahkan!');
        }
    }

    public function edit(Request $request, $id)
    {
        $demografi = Demografi::get();
        $data = MSMEs::where('id', $id)->firstOrFail();

        return view("admin.pages.umkm.edit", [ 
            "demografi" => $demografi,
            "data"      => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nib"           => "numeric|digits_between:10,20|nullable",
            "demografis_id" => "required",
            "name"          => "required|string|unique:micro_small_and_medium_enterprises,id,".$id,
            "address"       => "required|string",
            "description"   => "required",
            "business_type" => "required",
            "image_upload"  => "image|mimes:jpeg,png,jpg,gif|max:1024|nullable",
        ]);

        $this->collectImageAndThumbnail($request);
    
        try {
            MSMEs::where('id', $id)->update($request->except("_token", "_method", "image_upload"));
            return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil diubah!');
        } catch(\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->with('error_msg', 'Data UMKM gagal diubah!');
        }
    }
}
