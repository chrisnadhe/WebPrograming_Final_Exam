<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function show()
    {

        return view('laporan.laporan');
    }
}
