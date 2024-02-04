@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <!-- Other dashboard elements -->

    <div class="sdi-dashboard-number">
        <h2>SDI Score: {{ $sdiScore }}</h2>
    </div>
    
    <div style="width:500px; height:500px;">
        <canvas id="sdiRadarChart"></canvas>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('sdiRadarChart').getContext('2d');

            // Convert long labels to multi-line labels
            var chartLabels = @json(array_values($indikatorTitles)).map(function(label) {
                return label.split(' '); // Split each title by space to create multi-line labels
            });

            var sdiRadarChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Tingkat',
                        data: @json($data),
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: { // Adjust padding as needed
                            top: 40,
                            right: 40,
                            bottom: 40,
                            left: 40
                        }
                    },
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            min: 0,
                            max: 5,
                            ticks: {
                                stepSize: 1,
                                backdropColor: 'transparent'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true,
                        }
                    }
                }
            });
        });

    </script>
    

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>