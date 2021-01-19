<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function init()
    {
        $specialties = Specialty::where('status', 'activo')
            ->orderBy('name', 'ASC')
            ->get();
        return view('welcome', compact('specialties'));

    }
}
