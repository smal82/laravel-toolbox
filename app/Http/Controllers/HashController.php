<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HashController extends Controller
{
    public function show() {
        return view('tools.hash');
    }

    public function generate(Request $request) {
        $text = $request->input('testo');
        $algo = $request->input('algoritmo');

        $hash = match ($algo) {
            'md5' => md5($text),
            'sha1' => sha1($text),
            'sha256' => hash('sha256', $text),
            default => 'Algoritmo non valido',
        };

        return redirect('/tool/hash')->with('hash', $hash);
    }
}

