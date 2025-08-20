<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function generate(Request $request)
    {
        $length = $request->input('length', 12);
        $password = Str::random($length);

        return view('tools.password', ['password' => $password]);
    }
}

