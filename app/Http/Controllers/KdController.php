<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class KdController extends Controller
{
    protected $indikatorTitles = [
        'kd1' => '20101 Tingkat Kematangan Relevansi Data Terhadap Pengguna',
        'kd2' => '20102 Tingkat Kematangan Proses Identifikasi Kebutuhan Data',
        'kd3' => '20201 Tingkat Kematangan Penilaian Akurasi Data',
        'kd4' => '20301 Tingkat Kematangan Penjaminan Aktualitas Data',
        'kd5' => '20302 Tingkat Kematangan Pemantauan Ketepatan Waktu Diseminasi',
        'kd6' => '20401 Tingkat Kematangan Ketersediaan Data untuk Pengguna Data',
        'kd7' => '20402 Tingkat Kematangan Akses Media Penyebarluasan Data',
        'kd8' => '20403 Tingkat Kematangan Penyediaan Format Data',
        'kd9' => '20501 Tingkat Kematangan Keterbandingan Data',
        'kd10' => '20502 Tingkat Kematangan Konsistensi Statistik'
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

    public function calculateKdScore()
    {
        $indikatorWeights = [
            'kd1' => 0.6 * 0.21,
            'kd2' => 0.4 * 0.21,
            'kd3' => 0.16,
            'kd4' => 0.5 * 0.21,
            'kd5' => 0.5 * 0.21,
            'kd6' => 0.34 * 0.21,
            'kd7' => 0.33 * 0.21,
            'kd8' => 0.33 * 0.21,
            'kd9' => 0.5 * 0.21,
            'kd10' => 0.5 * 0.21,
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

        $kdScore = round($totalScore, 2);

        return [
            'kdScore' => $kdScore,
            'indikatorTitles' => $this->indikatorTitles,
            'data' => $data
        ];
    }

}
