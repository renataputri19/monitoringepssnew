<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function calculateScores()
    {
        // Call the calculation methods from different controllers
        $sdiData = app(SdiController::class)->calculateSdiScore();
        $kdData = app(kdController::class)->calculateKdScore();
        // ... similarly for other domains

        // Aggregate all scores data
        $scoresData = [
            'sdiData' => $sdiData,
            'kdData' => $kdData,
            // ... include other scores
        ];

        // Pass all scores data to the dashboard view
        return view('dashboard', $scoresData);
    }
}
