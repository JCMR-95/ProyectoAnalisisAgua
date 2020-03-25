<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RioController extends Controller
{

    public function verDetalles(Request $request)
    {
        $sector = request()->sector;
        dd($sector);
    }
}