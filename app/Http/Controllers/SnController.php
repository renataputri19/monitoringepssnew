<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class SnController extends Controller
{
    protected $indikatorTitles = [
        'sn1' => 'Tingkat Kematangan Penggunaan Data Statistik Dasar untuk Perencanaan, Monitoring, dan Evaluasi, dan atau Penyusunan Kebijakan',
        'sn2' => 'Tingkat Kematangan Penggunaan Data Statistik Sektoral untuk Perencanaan, Monitoring, dan Evaluasi, dan atau Penyusunan Kebijakan',
        'sn3' => 'Tingkat Kematangan Sosialisasi dan Literasi Hasil Statistik',
        'sn4' => 'Tingkat Kematangan Pelaksanaan Rekomendasi Kegiatan Statistik',
        'sn5' => 'Tingkat Kematangan Perencanaan Pembangunan Statistik',
        'sn6' => 'Tingkat Kematangan Penyebarluasan Data',
        'sn7' => 'Tingkat Kematangan Pemanfaatan Big Data',
    ];

    protected $tingkatTitles = [
        'tingkat1' => 'Tingkat 1',
        'tingkat2' => 'Tingkat 2',
        'tingkat3' => 'Tingkat 3',
        'tingkat4' => 'Tingkat 4',
        'tingkat5' => 'Tingkat 5',
    ];

    public function sn(){
        $files = File::all()->groupBy(['indikator', 'tingkat']);
        
        return view('sn', [
            'files' => $files, 
            'indikatorTitles' => $this->indikatorTitles,
            'tingkatTitles' => $this->tingkatTitles
        ]);
    }

    public function calculateSnScore()
    {
        $indikatorWeights = [
            'sn1' => 0.33 * 0.32,
            'sn2' => 0.33 * 0.32,
            'sn3' => 0.34 * 0.32,
            'sn4' => 0.26,
            'sn5' => 0.5 * 0.21,
            'sn6' => 0.5 * 0.21,
            'sn7' => 0.21,
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

        $snScore = round($totalScore, 2);

        return [
            'snScore' => $snScore,
            'indikatorTitles' => $this->indikatorTitles,
            'data' => $data
        ];
    }
}
