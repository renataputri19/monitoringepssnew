<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;



class SdiController extends Controller
{
    public function sdi(){
        $files = File::all()->groupBy(['indikator', 'tingkat']);
        // dd($files);
        $indikatorTitles = [
            'sds1' => 'Tingkat Kematangan Penerapan Standar Data Statistik (SDS)',
            'sds2' => 'Tingkat Kematangan Penerapan Metadata Statistik',
            'sds3' => 'Tingkat Kematangan Penerapan Interoperabilitas Data',
            'sds4' => 'Tingkat Kematangan Penerapan Kode Referensi',
        ];

        $tingkatTitles = [
            'tingkat1' => 'Tingkat 1',
            'tingkat2' => 'Tingkat 2',
            'tingkat3' => 'Tingkat 3',
            'tingkat4' => 'Tingkat 4',
            'tingkat5' => 'Tingkat 5',
        ];


        return view('sdi',compact('files', 'indikatorTitles','tingkatTitles') 
        );
    }
}

