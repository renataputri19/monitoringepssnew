@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')


    <section class="section-hero-domain" style="background-color: #F5F7FA;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="domain-title text-center">Perencanaan Kegiatan Statistik Sektoral 2024</h1>
                    <p class="domain-text">
                        Rangkaian kegiatan yang terencana untuk tahun 2024 dijelaskan dalam jadwal ini, merangkum tindakan yang dirancang berdasarkan evaluasi kinerja sektoral tahunan. Agenda tersebut dirancang untuk secara metodis menangani area yang membutuhkan perbaikan dan mengoptimalkan alokasi sumber daya. Jadwal ini merupakan bagian dari upaya berkesinambungan untuk mengangkat skor EPSS pada tahun 2024.
                    </p>
                </div>
            </div>
        </div>
    </section>


    

    <div class="container-jadwal" data-aos="fade-up">
        <!-- Other content -->
    
        <div class="text-center mb-4">
            <a href="https://docs.google.com/spreadsheets/d/1IIvd6kYLBMrfgjXQkLBo9J8CubXH-zbibo3yjGIiGV8/edit?usp=sharing" target="_blank" class="btn btn-primary">Open Spreadsheet</a>
        </div>
    
        <!-- Responsive iframe wrapper -->
        <div class="iframe-container">
            <iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSfE1jKTssJ7TmRKyEu_ExixFdZRdCoSv2CFU1bUQpZsE1mdlC-q1_8kB_RkjEELKFLxJR_yRxGYjWl/pubhtml?gid=1115838130&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
        </div>
        
        <!-- Other content -->
    </div>
    



@endsection
