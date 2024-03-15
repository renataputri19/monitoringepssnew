<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    public function perencanaan()
    {
        

        // If the user is a guest, show the perencanaan page
        return view('perencanaan');
    }
}
