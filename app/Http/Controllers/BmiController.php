<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    /**
     * Mostra il form BMI.
     */
    public function show()
    {
        return view('tools.bmi');
    }

    /**
     * Elabora il calcolo del BMI.
     */
    public function calculate(Request $request)
    {
        // Validazione dei dati
        $validated = $request->validate([
            'weight' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
        ]);

        // Estrazione dei dati validati
        $weight = $validated['weight'];
        $height = $validated['height'];

        // Calcolo BMI
        $heightInMeters = $height / 100;
        $bmi = round($weight / ($heightInMeters * $heightInMeters), 2);

        // Determinazione della categoria
        $category = match (true) {
            $bmi < 18.5 => 'Sottopeso',
            $bmi < 25 => 'Normopeso',
            $bmi < 30 => 'Sovrappeso',
            default => 'Obesità',
        };

        // Redirect con risultati e input
        return redirect('/tool/bmi')->with([
            'bmi' => $bmi,
            'category' => $category
        ])->withInput();
    }
}

