<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class PbsController extends Controller
{
    protected $indikatorTitles = [
        'pbs1' => 'Tingkat Kematangan Pendefinisian Kebutuhan Statistik',
        'pbs2' => 'Tingkat Kematangan Kematangan Desain Statistik',
        'pbs3' => 'Tingkat Kematangan Penyiapan Instrumen',
        'pbs4' => 'Tingkat Kematangan Proses Pengumpulan Data/Akuisisi Data',
        'pbs5' => 'Tingkat Kematangan Pengolahan Data',
        'pbs6' => 'Tingkat Kematangan Analisis Data',
        'pbs7' => 'Tingkat Kematangan Diseminasi Data',
    ];

    protected $tingkatTitles = [
        'tingkat1' => 'Tingkat 1',
        'tingkat2' => 'Tingkat 2',
        'tingkat3' => 'Tingkat 3',
        'tingkat4' => 'Tingkat 4',
        'tingkat5' => 'Tingkat 5',
    ];

    public function pbs(){
        $files = File::all()->groupBy(['indikator', 'tingkat']);
        
        return view('pbs', [
            'files' => $files, 
            'indikatorTitles' => $this->indikatorTitles,
            'tingkatTitles' => $this->tingkatTitles
        ]);
    }

    public function calculatePbsScore()
    {
        $indikatorWeights = [
            'pbs1' => 0.33 * 0.32,
            'pbs2' => 0.33 * 0.32,
            'pbs3' => 0.34 * 0.32,
            'pbs4' => 0.26,
            'pbs5' => 0.5 * 0.21,
            'pbs6' => 0.5 * 0.21,
            'pbs7' => 0.21,
            // add the rest of your indikators with their weights here
        ];

        $totalScore = 0;
        $indicators = array_keys($this->indikatorTitles);
        $data = [];
        $baseValue = 1;

        foreach ($indicators as $indikator) {
            $indikatorApproval = \App\Models\IndikatorApproval::where('indikator', $indikator)->first();
            
            if ($indikatorApproval && $indikatorApproval->disetujui) {
                $totalScore += ($indikatorApproval->tingkat * $indikatorWeights[$indikator]);
                $data[] = $indikatorApproval->tingkat;
            } else {
                $totalScore += $baseValue * $indikatorWeights[$indikator];
                $data[] = $baseValue; // Assuming base value of 1 if not approved
            }
        }

        $pbsScore = round($totalScore, 2);

        return [
            'pbsScore' => $pbsScore,
            'indikatorTitles' => $this->indikatorTitles,
            'data' => $data
        ];
    }
}
