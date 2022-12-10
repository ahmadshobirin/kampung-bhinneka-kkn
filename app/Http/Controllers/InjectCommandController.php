<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class InjectCommandController extends Controller
{
    public function clear()
    {
        if (config('app.env') == 'PROD' || !config('app.env') == 'PRODUCTION'){
            return response()->json(["message" => "env!"]);
        }

        Artisan::call("optimize:clear");

        return response()->json(["message" => "done!"]);
    }

    public function db()
    {
        if (config('app.env') == 'PROD' || !config('app.env') == 'PRODUCTION'){
            return response()->json(["message" => "env!"]);
        }

        Artisan::call("migrate:fresh");
        Artisan::call("db:seed");

        return response()->json(["message" => "done!"]);
    }
}
