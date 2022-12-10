<?php

namespace App\Http\Controllers;

use App\Models\Demografi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $headOfFamily = Demografi::sum('head_of_family');
        $inhabitant = Demografi::sum('inhabitant');
        $toddler = Demografi::sum('toddler');
        $elderly = Demografi::sum('elderly');
        
        return view('admin.pages.dashboard.index',[
            "headOfFamily" => $headOfFamily,
            "inhabitant"   => $inhabitant,
            "toddler"      => $toddler,
            "elderly"      => $elderly,
        ]);
    }
}
