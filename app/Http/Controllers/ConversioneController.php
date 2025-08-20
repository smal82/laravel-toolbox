<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversioneController extends Controller
{
    public function show() {
        return view('tools.conversione');
    }

    public function convert(Request $request) {
        $valore = $request->input('valore');
        $tipo = $request->input('tipo');

        $risultato = match ($tipo) {
            'kg-lb' => round($valore * 2.20462, 2) . ' lb',
            'lb-kg' => round($valore / 2.20462, 2) . ' kg',
            'cm-inch' => round($valore / 2.54, 2) . ' in',
            'inch-cm' => round($valore * 2.54, 2) . ' cm',
            default => 'Conversione non valida',
        };

        return redirect('/tool/conversione')->with('risultato', $risultato);
    }
}

