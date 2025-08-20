<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GpsController extends Controller
{
    public function show() {
        return view('tools.gps');
    }

    public function generate(Request $request) {
        $lat = round(mt_rand(-90000000, 90000000) / 1000000, 6);
        $lon = round(mt_rand(-180000000, 180000000) / 1000000, 6);

        return redirect('/tool/gps')->with('coords', ['lat' => $lat, 'lon' => $lon]);
    }
}

