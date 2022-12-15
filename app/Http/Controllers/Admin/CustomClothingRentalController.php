<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomClothingRental;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\File;


class CustomClothingRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CustomClothingRental::all();

        return view('admin.pages.custom_clothing_rental.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.custom_clothing_rental.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|min:5',
            'image_upload'  => 'required|file|mimes:jpeg,png,jpg,svg|max:1024',
            'price'         => 'required',
            'description'   => 'required|min:5'
        ]);

        $upload = $this->handleUpload();
        if (!$upload) {
            return redirect()->back()->with('error', 'Data gagal ditambahkan.');
        }

        $request->merge([
            "image"         => $upload['filename'],
            "created_by"    => Auth::user()->name,
            "created_by_id" => Auth::user()->id,
        ]);

        CustomClothingRental::create($request->except("_token", "image_upload"));

        return redirect()->route('clothing.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CustomClothingRental::orderBy('id', 'desc')->where('id', $id)->firstOrFail();

        return view('admin.pages.custom_clothing_rental.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = [
            'name'         => 'required|min:5',
            'image_upload'  => 'required|file|mimes:jpeg,png,jpg,svg|max:1024',
            'price'         => 'required',
            'description'   => 'required|min:5'
        ];
        if ($request->file('image_upload')) {
            $validation = array_merge($validation, [
                'image_upload'  => 'required|file|mimes:jpeg,png,jpg,svg,pdf,doc,docx,xls,xlsx|max:10000'
            ]);
        }
        $request->validate($validation);

        if ($request->file('image_upload')) {
            $upload = $this->handleUpload();
            $request->merge([
                "image"         => $upload['filename'],
            ]);
            if (!$upload) {
                return redirect()->back()->with('error', 'Data gagal ditambahkan.');
            }
        }

        CustomClothingRental::where('id', $id)->update($request->except("_token", "_method", "image_upload", "url"));

        return redirect()->route('clothing.index')->with('success', 'Data berhasil dipudate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            CustomClothingRental::where('id', $id)->delete();

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
        $path       = public_path() . "/uploads/clothing";
        $filename   = uniqid() . date('Yds') . "_" . $file->getClientOriginalName();

        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        Image::make($file)->save($path . '/' . $filename);

        return [
            'filename' => $filename
        ];
    }
}
