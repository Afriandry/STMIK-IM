<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function pertemuanpertama()
    {
        return view('pertemuan1');
    }

    public function tugaspertama()
    {
        $data = [];
        return view('tugas1', compact('data'));
    }

    public function saveGaji(Request $request)
    {
        $data = $request->except("_token");
        return view('tugas1', compact('data'));
    }
}
