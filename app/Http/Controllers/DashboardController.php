<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\File;

class DashboardController extends Controller
{
    public function calculateSdiScore()
    {
        $baseValue = 1; // Base value for each indikator
        $totalScore = 0;
        $indikatorBaseValue = 0.25; // Since there are 4 indikators, each contributes 25%
        $indicators = ['sds1', 'sds2', 'sds3', 'sds4'];
        // Prepare the labels and the data for the radar chart
        
        $data = [];

        $indikatorTitles = [
            'sds1' => 'Tingkat Kematangan Penerapan Standar Data Statistik (SDS)',
            'sds2' => 'Tingkat Kematangan Penerapan Metadata Statistik',
            'sds3' => 'Tingkat Kematangan Penerapan Interoperabilitas Data',
            'sds4' => 'Tingkat Kematangan Penerapan Kode Referensi',
        ];
    
        foreach ($indicators as $indikator) {
            // Retrieve the indikator approval entry
            $indikatorApproval = \App\Models\IndikatorApproval::where('indikator', $indikator)->first();
    
            if ($indikatorApproval && $indikatorApproval->disetujui) {
                // If approved, use the tingkat value
                $totalScore += ($indikatorApproval->tingkat) * $indikatorBaseValue;
                $data[] = $indikatorApproval ? $indikatorApproval->tingkat : $baseValue;
            } else {
                // If not approved, use the base value
                $totalScore += $baseValue * $indikatorBaseValue;
                $data[] = $indikatorApproval ? $indikatorApproval->tingkat : $baseValue;
            }
        }
    
        // Final SDI score, rounded to 2 decimal places
        $sdiScore = round($totalScore,2);
    
        // Pass the labels and data to the view
        return view('dashboard', compact('sdiScore', 'indikatorTitles', 'data'));
    }
    
}


