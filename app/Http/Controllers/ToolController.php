<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    public function index() {
        return view('tools.index');
    }

    public function password() {
        return view('tools.password');
    }

    public function generatePassword(Request $request) {
        $length = $request->input('length', 12);
        $password = Str::random($length);
        return view('tools.password', compact('password'));
    }


public function bmi() {
    return view('tools.bmi');
}

public function calculateBmi(Request $request) {
    $weight = $request->input('weight');
    $height = $request->input('height') / 100; // da cm a metri
    $bmi = round($weight / ($height * $height), 2);

    $category = match(true) {
        $bmi < 18.5 => 'Sottopeso',
        $bmi < 25 => 'Normale',
        $bmi < 30 => 'Sovrappeso',
        default => 'Obesità'
    };

    return view('tools.bmi', compact('bmi', 'category'));
}

public function color() {
    return view('tools.color');
}

public function convertColor(Request $request) {
    $result = null;

    if ($request->convert === 'hex') {
        $hex = ltrim($request->hex, '#');
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $result = "$r, $g, $b";
    } elseif ($request->convert === 'rgb') {
        [$r, $g, $b] = explode(',', $request->rgb);
        $result = sprintf("#%02x%02x%02x", $r, $g, $b);
    }

    return view('tools.color', compact('result'));
}



public function qrcode() {
    return view('tools.qrcode');
}

public function generateQr(Request $request) {
    $text = $request->input('text');
    $qr = QrCode::size(200)->generate($text);
    return view('tools.qrcode', compact('qr'));
}

}
