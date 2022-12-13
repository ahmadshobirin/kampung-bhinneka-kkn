<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MicroSmallAndMediumEnterprise as MSMEs;
use Illuminate\Http\Request;


class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $data = MSMEs::with('demografi')
            ->where('name', 'ILIKE', "%{$request->search}%")
            ->paginate(10);

        // dd($data);

        return view('umkm', compact(['data']));
    }

    // Detail UMKM
    public function show(Request $request)
    {
        $id = $request->id;

        $data = MSMEs::findOrFail($id);

        return view('umkmDetail', $data);
    }
}
