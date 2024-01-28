<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class SdiController extends Controller
{
    public function sdi(){
        $files = File::all();
        // dd($files);
        return view('sdi',[
            'file' => $files 
        ]);
    }
}
