<?php

namespace App\Http\Controllers;
use App\PaskelbtasKonkursas;
use Illuminate\Http\Request;

class KalendoriusController extends Controller
{
    public function index()
    {
       $konkursai = PaskelbtasKonkursas::all();
       return view('kalendorius.index', compact('konkursai'));
    }
}
