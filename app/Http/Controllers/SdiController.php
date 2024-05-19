<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;


class SdiController extends Controller
{
    protected $indikatorTitles = [
        'sds1' => '10101 Tingkat Kematangan Penerapan Standar Data Statistik (SDS)',
        'sds2' => '10201 Tingkat Kematangan Penerapan Metadata Statistik',
        'sds3' => '10301 Tingkat Kematangan Penerapan Interoperabilitas Data',
        'sds4' => '10401 Tingkat Kematangan Penerapan Kode Referensi',
    ];

    protected $tingkatTitles = [
        'tingkat1' => 'Tingkat 1',
        'tingkat2' => 'Tingkat 2',
        'tingkat3' => 'Tingkat 3',
        'tingkat4' => 'Tingkat 4',
        'tingkat5' => 'Tingkat 5',
    ];

    public function sdi(){
        $files = File::all()->groupBy(['indikator', 'tingkat']);
        return view('sdi', [
            'files' => $files, 
            'indikatorTitles' => $this->indikatorTitles,
            'tingkatTitles' => $this->tingkatTitles
        ]);
    }

    public function calculateSdiScore()
    {
        $baseValue = 1; // Base value for each indikator
        $totalScore = 0;
        $indikatorBaseValue = 0.25; // Since there are 4 indikators, each contributes 25%
        $indicators = array_keys($this->indikatorTitles); // Get the keys from the titles array
        $data = []; // Array to hold the scores for each indikator
    
        foreach ($indicators as $indikator) {
            // Retrieve the indikator approval entry
            $indikatorApproval = \App\Models\IndikatorApproval::where('indikator', $indikator)->first();
        
            if ($indikatorApproval && $indikatorApproval->disetujui) {
                // If approved, use the tingkat value
                $totalScore += ($indikatorApproval->tingkat) * $indikatorBaseValue;
                $data[] = $indikatorApproval->tingkat; // Assured that $indikatorApproval exists
            } else {
                // If not approved or does not exist, use the base value
                $totalScore += $baseValue * $indikatorBaseValue;
                $data[] = $baseValue; // Use base value
            }
        }
    
        // Final SDI score, rounded to 2 decimal places
        $sdiScore = round($totalScore,2);
    
        // Pass the labels and data to the view
        return [
            'sdiScore' => $sdiScore,
            'indikatorTitles' => $this->indikatorTitles,
            'data' => $data
        ];
    }
}

