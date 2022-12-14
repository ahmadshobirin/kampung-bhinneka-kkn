<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demografi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DemografiController extends Controller
{
    public function index()
    {
        $data = Demografi::orderBy('neighborhood', 'asc')->get();

        return view('admin.pages.master.demografi.index')->with('data', $data);
    }

    public function edit(Request $request, $id)
    {
        $data = Demografi::orderBy('neighborhood', 'asc')->where('id', $id)->firstOrFail();

        return view('admin.pages.master.demografi.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            Demografi::where('id', $id)->update($request->except('_method', '_token', 'url'));
    
            return redirect()->route('demografi.index')->with('success', 'Data demografi berhasil diubah!');
        } catch(\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->with('error_msg', 'Data demografi gagal diubah!');
        }
    }
}
