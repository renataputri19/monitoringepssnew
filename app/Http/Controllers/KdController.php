<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class KdController extends Controller
{
    protected $indikatorTitles = [
        'kd1' => 'Tingkat Kematangan Relevansi Data Terhadap Pengguna',
        'kd2' => 'Tingkat Kematangan Proses Identifikasi Kebutuhan Data',
        'kd3' => 'Tingkat Kematangan Penilaian Akurasi Data',
        'kd4' => 'Tingkat Kematangan Penjaminan Aktualitas Data',
        'kd5' => 'Tingkat Kematangan Pemantauan Ketepatan Waktu Diseminasi',
        'kd6' => 'Tingkat Kematangan Ketersediaan Data untuk Pengguna Data',
        'kd7' => 'Tingkat Kematangan Akses Media Penyebarluasan Data',
        'kd8' => 'Tingkat Kematangan Penyediaan Format Data',
        'kd9' => 'Tingkat Kematangan Keterbandingan Data',
        'kd10' => 'Tingkat Kematangan Konsistensi Statistik'
    ];

    protected $tingkatTitles = [
        'tingkat1' => 'Tingkat 1',
        'tingkat2' => 'Tingkat 2',
        'tingkat3' => 'Tingkat 3',
        'tingkat4' => 'Tingkat 4',
        'tingkat5' => 'Tingkat 5',
    ];

    public function kd(){
        $files = File::all()->groupBy(['indikator', 'tingkat']);
        
        return view('kd', [
            'files' => $files, 
            'indikatorTitles' => $this->indikatorTitles,
            'tingkatTitles' => $this->tingkatTitles
        ]);
    }

    public function calculatekdScore()
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
        $kdScore = round($totalScore,2);
    
        // Pass the labels and data to the view
        return [
            'kdScore' => $kdScore,
            'indikatorTitles' => $this->indikatorTitles,
            'data' => $data
        ];
    }
}
