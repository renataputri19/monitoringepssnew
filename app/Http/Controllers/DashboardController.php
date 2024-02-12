<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function calculateScores()
    {
        // Call the calculation methods from different controllers
        $sdiData = app(SdiController::class)->calculateSdiScore();
        $kdData = app(KdController::class)->calculateKdScore();
        $pbsData = app(PbsController::class)->calculatePbsScore();
        $kelembagaanData = app(KelembagaanController::class)->calculateKelembagaanScore();
        $snData = app(SnController::class)->calculateSnScore();
        // ... similarly for other domains


        // Define the weights for each domain score
        $weights = [
            'sdi' => 0.28,
            'kd' => 0.24,
            'pbs' => 0.19,
            'kelembagaan' => 0.17,
            'sn' => 0.12,
        ];

        // Aggregate domain scores
        $domainScores = [
            'sdi' => app(SdiController::class)->calculateSdiScore()['sdiScore'],
            'kd' => app(KdController::class)->calculateKdScore()['kdScore'],
            'pbs' => app(PbsController::class)->calculatePbsScore()['pbsScore'],
            'kelembagaan' => app(KelembagaanController::class)->calculateKelembagaanScore()['kelembagaanScore'],
            'sn' => app(SnController::class)->calculateSnScore()['snScore'],
        ];

        // Calculate weighted scores
        $totalScore = 0;
        foreach ($domainScores as $domain => $score) {
            $totalScore += $score * $weights[$domain];
        }

        // Round the total score to 2 decimal places
        $dashboardScore = round($totalScore, 2);

        $dashboardData = [
            'dashboardScore' => $dashboardScore,
            'indikatorTitles' => [
                'sdi' => "Prinsip SDI",
                'kd' => "Kualitas Data",
                'pbs' => "Proses Bisnis Statistik",
                'kelembagaan' => "Kelembagaan",
                'sn' => "Statistik Nasional",
            ],
            'data' => [
                'sdi' => $sdiData['sdiScore'],
                'kd' => $kdData['kdScore'],
                'pbs' => $pbsData['pbsScore'],
                'kelembagaan' => $kelembagaanData['kelembagaanScore'],
                'sn' => $snData['snScore'],
                // ... add other domain data
            ],
        ];

        // Aggregate all scores data
        $scoresData = [
            'sdiData' => $sdiData,
            'kdData' => $kdData,
            'pbsData' => $pbsData,
            'kelembagaanData' => $kelembagaanData,
            'snData' => $snData,
            'dashboardData' => $dashboardData
            // ... include other scores
        ];

        

        // Pass all scores data to the dashboard view
        return view('dashboard', $scoresData);
    }
}
