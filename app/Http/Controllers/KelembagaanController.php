<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class KelembagaanController extends Controller
{
    protected $indikatorTitles = [
        'kelembagaan1' => '40101 Tingkat Kematangan Penjaminan Transparansi Informasi Statistik',
        'kelembagaan2' => '40102 Tingkat Kematangan Penjaminan Netralitas dan Objektivitas terhadap Penggunaan Sumber Data dan Metodologi',
        'kelembagaan3' => '40103 Tingkat Kematangan Penjaminan Kualitas Data',
        'kelembagaan4' => '40104 Tingkat Kematangan Penjaminan Konfidensialitas Data',
        'kelembagaan5' => '40201 Tingkat Kematangan Pemenuhan Kompetensi SDM Bidang Statistik',
        'kelembagaan6' => '40202 Tingkat Kematangan Pemenuhan Kompetensi SDM Bidang Manajemen Data',
        'kelembagaan7' => '40301 Tingkat Kematangan Kolaborasi Penyelenggaraan Kegiatan Statistik',
        'kelembagaan8' => '40302 Tingkat Kematangan Penyelenggaraan Forum Satu Data Indonesia',
        'kelembagaan9' => '40303 Tingkat Kematangan Kolaborasi dengan Pembina Data Statistik',
        'kelembagaan10' => '40304 Tingkat Kematangan Pelaksanaan Tugas Sebagai Walidata'
    ];

    protected $tingkatTitles = [
        'tingkat1' => 'Tingkat 1',
        'tingkat2' => 'Tingkat 2',
        'tingkat3' => 'Tingkat 3',
        'tingkat4' => 'Tingkat 4',
        'tingkat5' => 'Tingkat 5',
    ];

    public function kelembagaan(){
        $files = File::all()->groupBy(['indikator', 'tingkat']);
        
        return view('kelembagaan', [
            'files' => $files, 
            'indikatorTitles' => $this->indikatorTitles,
            'tingkatTitles' => $this->tingkatTitles
        ]);
    }

    public function calculateKelembagaanScore()
    {
        $indikatorWeights = [
            'kelembagaan1' => 0.25 * 0.35,
            'kelembagaan2' => 0.25 * 0.35,
            'kelembagaan3' => 0.25 * 0.35,
            'kelembagaan4' => 0.25 * 0.35,
            'kelembagaan5' => 0.5 * 0.30,
            'kelembagaan6' => 0.5 * 0.30,
            'kelembagaan7' => 0.25 * 0.35,
            'kelembagaan8' => 0.25 * 0.35,
            'kelembagaan9' => 0.25 * 0.35,
            'kelembagaan10' => 0.25 * 0.35,
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

        $kelembagaanScore = round($totalScore, 2);

        return [
            'kelembagaanScore' => $kelembagaanScore,
            'indikatorTitles' => $this->indikatorTitles,
            'data' => $data
        ];
    }
}
