<?php

namespace App\Http\Controllers;

use App\Models\Demografi;
use App\Models\MicroSmallAndMediumEnterprise;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $headOfFamily = Demografi::sum('head_of_family');
        $inhabitant = Demografi::sum('inhabitant');
        $toddler = Demografi::sum('toddler');
        $elderly = Demografi::sum('elderly');

        return view("index", [
            "headOfFamily" => $headOfFamily,
            "inhabitant"   => $inhabitant,
            "toddler"      => $toddler,
            "elderly"      => $elderly,
            "parent"       => "Beranda",
        ]);
    }

    public function umkm()
    {
        $data = MicroSmallAndMediumEnterprise::latest()->paginate(10);
        
        return view('umkm', [
            'data' => $data,
            'parent' => 'UMKM'
        ]);
    }
}
