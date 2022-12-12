<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Demografi;
use App\Models\MicroSmallAndMediumEnterprise as MSMEs;
use Illuminate\Http\Request;

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

    private function checkRequest(Request $request)
    {
        $request->validate([
            "nib"           => "numeric|digits_between:10,20",
            "demografis_id" => "required",
            "name"          => "required|string",
            "address"       => "required|string",
            "description"   => "required",
            "business_type" => "required",
            "image_upload"  => "image|mimes:jpeg,png,jpg,gif|max:1024",
        ]);

        return true;
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
        try {
            $this->checkRequest($request);
            $this->collectImageAndThumbnail($request);
    
            MSMEs::create($request->except("_token"));
    
            return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('umkm.index')->with('error_msg', 'Data UMKM gagal ditambahkan!');
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
        try {
            $this->checkRequest($request);
            $this->collectImageAndThumbnail($request);
    
            MSMEs::where('id', $id)->update($request->except("_token", "_method", "image_upload"));
    
            return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil diubah!');
        } catch(\Exception $e) {
            return redirect()->route('umkm.index')->with('error_msg', 'Data UMKM gagal diubah!');
        }
    }
}
