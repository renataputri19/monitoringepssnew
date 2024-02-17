@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <!-- Dashboard Section -->
    <section class="dashboard-section py-5">
        <div class="container">
            <!-- Main Score Chart -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="chart-container text-center">
                        <h2 class="dashboard-header">Score: {{ $dashboardData['dashboardScore']  }}</h2>
                        <canvas id="dashboardRadarChart" style="width:500px; height:500px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-up">
                    <div class="chart-container">
                        <h2 class="dashboard-header">SDI Score: {{ $sdiData['sdiScore'] }}</h2>
                        <canvas id="sdiRadarChart" style="width:500px; height:500px;"></canvas>
                        
                    </div>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-up">
                    <div class="chart-container">
                        <h2 class="dashboard-header">KD Score: {{ $kdData['kdScore'] }}</h2>
                        <canvas id="kdRadarChart" style="width:500px; height:500px;"></canvas> 
                    </div>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-up">
                    <div class="chart-container">
                        <h2 class="dashboard-header">PBS Score: {{ $pbsData['pbsScore'] }}</h2>
                        <canvas id="pbsRadarChart" style="width:500px; height:500px;"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-up">
                    <div class="chart-container">
                        <h2 class="dashboard-header">Kelembagaan Score: {{ $kelembagaanData['kelembagaanScore'] }}</h2>
                        <canvas id="kelembagaanRadarChart" style="width:500px; height:500px;"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 offset-lg-3" data-aos="fade-up">
                    <div class="chart-container ">
                        <h2 class="dashboard-header">Statistik Nasional Score: {{ $snData['snScore'] }}</h2>
                        <canvas id="snRadarChart" style="width:500px; height:500px;"></canvas>
                    </div>
                </div>
                <!-- Repeat for other charts -->
            </div>
        </div>
    </section>

    <div class="container-jadwal" data-aos="fade-up">
        <!-- Other content -->
        
        <h2 class="text-center mb-4">Dashboard Perencanaan Statistik Sektoral 2024</h2>
        <div class="text-center mb-4">
            <a href="https://docs.google.com/spreadsheets/d/1IIvd6kYLBMrfgjXQkLBo9J8CubXH-zbibo3yjGIiGV8/edit?usp=sharing" target="_blank" class="btn btn-primary">Open Spreadsheet</a>
        </div>
    
        <!-- Responsive iframe wrapper -->
        <div class="iframe-container">
            <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSfE1jKTssJ7TmRKyEu_ExixFdZRdCoSv2CFU1bUQpZsE1mdlC-q1_8kB_RkjEELKFLxJR_yRxGYjWl/pubhtml?gid=1115838130&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
        </div>
        
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

        function splitLabelEveryTwoWords(label) {
            let words = label.split(' ');
            let parts = [];
            for (let i = 0; i < words.length; i += 2) {
                // Take two words at a time and join them with a space, add to parts array
                parts.push(words.slice(i, i + 2).join(' '));
            }
            return parts; // Returns an array of strings, each containing two words
        }


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
                            pointLabels: {
                                font: {
                                    size: 12 // Smaller font size
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
                    },
                    plugins: {
                        legend: {
                            display: false // Optionally hide the legend if it's not needed
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
                                font: {
                                    size: 10 // Smaller font size
                                },
                                callback: function(label) {
                                    return splitLabelEveryTwoWords(label); // Use the custom function for splitting labels
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
                    },
                    plugins: {
                        legend: {
                            display: false // Optionally hide the legend if it's not needed
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
                                font: {
                                    size: 10 // Smaller font size
                                },
                                callback: function(label) {
                                    return splitLabelEveryTwoWords(label); // Use the custom function for splitting labels
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
                    },
                    plugins: {
                        legend: {
                            display: false // Optionally hide the legend if it's not needed
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
                                font: {
                                    size: 10 // Smaller font size
                                },
                                callback: function(label) {
                                    return splitLabelEveryTwoWords(label); // Use the custom function for splitting labels
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
                    },
                    plugins: {
                        legend: {
                            display: false // Optionally hide the legend if it's not needed
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
                                font: {
                                    size: 10 // Smaller font size
                                },
                                callback: function(label) {
                                    return splitLabelEveryTwoWords(label); // Use the custom function for splitting labels
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
                    },
                    plugins: {
                        legend: {
                            display: false // Optionally hide the legend if it's not needed
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
                                font: {
                                    size: 10 // Smaller font size
                                },
                                callback: function(label) {
                                    return splitLabelEveryTwoWords(label); // Use the custom function for splitting labels
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
                    },
                    plugins: {
                        legend: {
                            display: false // Optionally hide the legend if it's not needed
                        }
                    }
                }

            });

            // Initialize more charts for other domains as needed...
        });
    </script>
@endsection
