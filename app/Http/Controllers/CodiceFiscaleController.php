<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Helpers\CodiceFiscaleHelper;

class CodiceFiscaleController extends Controller
{
    public function show()
    {
        // Verifica che il file esista
        $path = storage_path('app/comuni.json');
        if (!file_exists($path)) {
            dd('File comuni.json non trovato in: ' . $path);
        }

        // Carica e decodifica il file
        $raw = file_get_contents($path);
        $comuni = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            dd('Errore nel JSON: ' . json_last_error_msg());
        }

        return view('tools.codicefiscale', compact('comuni'));
    }

    public function calculate(Request $request)
    {
        // Verifica che il file esista
        $path = storage_path('app/comuni.json');
        if (!file_exists($path)) {
            dd('File comuni.json non trovato in: ' . $path);
        }

        // Carica e decodifica il file
        $raw = file_get_contents($path);
        $comuni = json_decode($raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            dd('Errore nel JSON: ' . json_last_error_msg());
        }

        // Estrai il nome del comune e cerca il codice catastale
        $nomeComune = strtoupper(trim($request->input('comune')));

        $comuneTrovato = collect($comuni)->first(function ($comune) use ($nomeComune) {
            return strtoupper(trim($comune['denominazione_ita'])) === $nomeComune;
        });

        $codiceCatastale = $comuneTrovato['codice_belfiore'] ?? null;

        if (!$codiceCatastale) {
            return redirect('/tool/codicefiscale')->withErrors([
                'comune' => 'Comune non valido o non trovato.'
            ]);
        }

        // Calcola il codice fiscale
        $cf = CodiceFiscaleHelper::calcola(
            $request->input('nome'),
            $request->input('cognome'),
            $request->input('sesso'),
            $request->input('data'),
            $codiceCatastale
        );

        return redirect('/tool/codicefiscale')->with('cf', $cf);
    }
}

