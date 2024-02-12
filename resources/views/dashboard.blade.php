@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <!-- SDI Score Section -->
    <section class="mb-4">
        <h2>SDI Score: {{ $sdiData['sdiScore'] }}</h2>
        <canvas id="sdiRadarChart" style="width:500px; height:500px;"></canvas>
    </section>

    <!-- KD Score Section -->
    <section class="mb-4">
        <h2>KD Score: {{ $kdData['kdScore'] }}</h2>
        <canvas id="kdRadarChart" style="width:500px; height:500px;"></canvas>
    </section>

    <!-- More sections for other domains... -->

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Initialize Radar Charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // SDI Radar Chart
            new Chart(document.getElementById('sdiRadarChart').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: @json(array_values($sdiData['indikatorTitles'])),
                    datasets: [{
                        label: 'SDI Tingkat',
                        data: @json($sdiData['data']),
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                            min: 0,
                            max: 5,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });

            // KD Radar Chart
            new Chart(document.getElementById('kdRadarChart').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: @json(array_values($kdData['indikatorTitles'])),
                    datasets: [{
                        label: 'KD Tingkat',
                        data: @json($kdData['data']),
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                            min: 0,
                            max: 5,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });

            // Initialize more charts for other domains as needed...
        });
    </script>
@endsection
