@extends('layouts.main')

@section('title', 'Dashboard')

<head>
    <!-- Other head content -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/list-opd.css') }}" rel="stylesheet">
</head>

@section('content')

    <!-- Dashboard Section -->
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <!-- Each Chart Column -->
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <!-- Dashboard Score Section -->
                        <section class="dashboard-section">
                            <h2 class="dashboard-header">Score: {{ $dashboardData['dashboardScore']  }}</h2>
                            <canvas id="dashboardRadarChart" style="width:500px; height:500px;"></canvas>
                        </section>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <!-- SDI Score Section -->
                        <section class="dashboard-section">
                            {{-- <h2 class="dashboard-header">SDI Score: {{ $sdiData['sdiScore'] }}</h2>
                            <canvas id="sdiRadarChart" style="width:500px; height:500px;"></canvas> --}}
                        </section>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <!-- SDI Score Section -->
                        <section class="dashboard-section">
                            <h2 class="dashboard-header">SDI Score: {{ $sdiData['sdiScore'] }}</h2>
                            <canvas id="sdiRadarChart" style="width:500px; height:500px;"></canvas>
                        </section>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <!-- KD Score Section -->
                        <section class="dashboard-section">
                            <h2 class="dashboard-header">KD Score: {{ $kdData['kdScore'] }}</h2>
                            <canvas id="kdRadarChart" style="width:500px; height:500px;"></canvas>
                        </section>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <!-- PBS Score Section -->
                        <section class="dashboard-section">
                            <h2 class="dashboard-header">PBS Score: {{ $pbsData['pbsScore'] }}</h2>
                            <canvas id="pbsRadarChart" style="width:500px; height:500px;"></canvas>
                        </section>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <!-- kelembagaan Score Section -->
                        <section class="dashboard-section">
                            <h2 class="dashboard-header">Kelembagaan Score: {{ $kelembagaanData['kelembagaanScore'] }}</h2>
                            <canvas id="kelembagaanRadarChart" style="width:500px; height:500px;"></canvas>
                        </section>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="chart-container">
                        <!-- sn Score Section -->
                        <section class="dashboard-section">
                            <h2 class="dashboard-header">Statistik Nasional Score: {{ $snData['snScore'] }}</h2>
                            <canvas id="snRadarChart" style="width:500px; height:500px;"></canvas>
                        </section>
                    </div>
                </div>
                <!-- Repeat for other charts -->
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Other content -->
        
        <h2>Dashboard Perencanaan Statistik Sektoral 2024</h2>
        <a href="https://docs.google.com/spreadsheets/d/1IIvd6kYLBMrfgjXQkLBo9J8CubXH-zbibo3yjGIiGV8/edit?usp=sharing" target="_blank" class="btn btn-primary">Open Spreadsheet</a>

        <!-- Embed iframe for spreadsheet -->
        <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSfE1jKTssJ7TmRKyEu_ExixFdZRdCoSv2CFU1bUQpZsE1mdlC-q1_8kB_RkjEELKFLxJR_yRxGYjWl/pubhtml?gid=1115838130&amp;single=true&amp;widget=true&amp;headers=false" width="1500" height="700" frameborder="0"></iframe>
        <
        <!-- Other content -->
    </div>

    {{-- <!-- Dashboard Score Section -->
    <section class="dashboard-section">
        <h2 class="dashboard-header">Score: {{ $dashboardData['dashboardScore']  }}</h2>
        <canvas id="dashboardRadarChart" style="width:500px; height:500px;"></canvas>
    </section>


    <!-- SDI Score Section -->
    <section class="dashboard-section">
        <h2 class="dashboard-header">SDI Score: {{ $sdiData['sdiScore'] }}</h2>
        <canvas id="sdiRadarChart" style="width:500px; height:500px;"></canvas>
    </section>

    <!-- KD Score Section -->
    <section class="dashboard-section">
        <h2 class="dashboard-header">KD Score: {{ $kdData['kdScore'] }}</h2>
        <canvas id="kdRadarChart" style="width:500px; height:500px;"></canvas>
    </section>

    <!-- PBS Score Section -->
    <section class="dashboard-section">
        <h2 class="dashboard-header">PBS Score: {{ $pbsData['pbsScore'] }}</h2>
        <canvas id="pbsRadarChart" style="width:500px; height:500px;"></canvas>
    </section>

    <!-- kelembagaan Score Section -->
    <section class="dashboard-section">
        <h2 class="dashboard-header">Kelembagaan Score: {{ $kelembagaanData['kelembagaanScore'] }}</h2>
        <canvas id="kelembagaanRadarChart" style="width:500px; height:500px;"></canvas>
    </section>

    <!-- sn Score Section -->
    <section class="dashboard-section">
        <h2 class="dashboard-header">Statistik Nasional Score: {{ $snData['snScore'] }}</h2>
        <canvas id="snRadarChart" style="width:500px; height:500px;"></canvas>
    </section> --}}

    <!-- More sections for other domains... -->

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Initialize Radar Charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Dashboard Radar Chart
            new Chart(document.getElementById('dashboardRadarChart').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: @json(array_values($dashboardData['indikatorTitles'])),
                    datasets: [{
                        label: 'Dashboard Tingkat',
                        data: [
                                @json($dashboardData['data']['sdi']),
                                @json($dashboardData['data']['kd']),
                                @json($dashboardData['data']['pbs']),
                                @json($dashboardData['data']['kelembagaan']),
                                @json($dashboardData['data']['sn']),
                            ],
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
                        pointLabels: {
                            callback: function(label, index) {
                            // Split the label into words and return them in the format you want
                            // For instance, if you want to split the label into two lines after a space:
                            return label.split(' ');
                            // This will display each word on a new line within the radar chart.
                            }
                        },
                        angleLines: {
                            display: true
                        },
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
                        pointLabels: {
                            callback: function(label, index) {
                            // Split the label into words and return them in the format you want
                            // For instance, if you want to split the label into two lines after a space:
                            return label.split(' ');
                            // This will display each word on a new line within the radar chart.
                            }
                        },
                        angleLines: {
                            display: true
                        },
                        min: 0,
                        max: 5,
                        ticks: {
                            stepSize: 1
                        }
                        }
                    }
                }
            });

            // PBS Radar Chart
            new Chart(document.getElementById('pbsRadarChart').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: @json(array_values($pbsData['indikatorTitles'])),
                    datasets: [{
                        label: 'PBS Tingkat',
                        data: @json($pbsData['data']),
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                        pointLabels: {
                            callback: function(label, index) {
                            // Split the label into words and return them in the format you want
                            // For instance, if you want to split the label into two lines after a space:
                            return label.split(' ');
                            // This will display each word on a new line within the radar chart.
                            }
                        },
                        angleLines: {
                            display: true
                        },
                        min: 0,
                        max: 5,
                        ticks: {
                            stepSize: 1
                        }
                        }
                    }
                }
            });

            // kelembagaan Radar Chart
            new Chart(document.getElementById('kelembagaanRadarChart').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: @json(array_values($kelembagaanData['indikatorTitles'])),
                    datasets: [{
                        label: 'Kelembagaan Tingkat',
                        data: @json($kelembagaanData['data']),
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                        pointLabels: {
                            callback: function(label, index) {
                            // Split the label into words and return them in the format you want
                            // For instance, if you want to split the label into two lines after a space:
                            return label.split(' ');
                            // This will display each word on a new line within the radar chart.
                            }
                        },
                        angleLines: {
                            display: true
                        },
                        min: 0,
                        max: 5,
                        ticks: {
                            stepSize: 1
                        }
                        }
                    }
                }
            });

            // sn Radar Chart
            new Chart(document.getElementById('snRadarChart').getContext('2d'), {
                type: 'radar',
                data: {
                    labels: @json(array_values($snData['indikatorTitles'])),
                    datasets: [{
                        label: 'Statistik Nasional Tingkat',
                        data: @json($snData['data']),
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                        pointLabels: {
                            callback: function(label, index) {
                            // Split the label into words and return them in the format you want
                            // For instance, if you want to split the label into two lines after a space:
                            return label.split(' ');
                            // This will display each word on a new line within the radar chart.
                            }
                        },
                        angleLines: {
                            display: true
                        },
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
