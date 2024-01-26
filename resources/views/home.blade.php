@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section for Beranda -->
    <section id="beranda" style="height: 589px; background-color: #F5F7FA;">
        <div class="hero bg-light" style="height: 589px; background-color: #F5F7FA;">
            <div class="container h-100 d-flex justify-content-center align-items-center flex-column">
                <h1 class="display-4 text-center" style="color: #4CAF4F;">
                    Sistem Monitoring EPSS BPS Batam
                </h1>
                <p class="text-center" style="color: #717171;">
                    Portal ini bertujuan untuk memantau dan menyajikan informasi terkini mengenai Evaluasi Penyelenggaraan Statistik Sektoral (EPSS) di Batam.
                </p>
                <a href="{{ url('/login') }}" class="btn btn-success mt-3">Login</a>
            </div>
        </div>
    </section>

    <!-- Section for Tentang EPSS -->
    <section id="tentang-epss" style="height: 589px; background-color: #FFFFFF;">
        <h1>Tentang EPSS</h1>
        <!-- Other Tentang EPSS content goes here -->
    </section>

    <!-- Section for Romantik -->
    <section id="romantik" style="height: 589px; background-color: #F5F7FA;">
        <h1>Romantik</h1>
        <!-- Other Romantik content goes here -->
    </section>

    <!-- Section for Simbatik -->
    <section id="simbatik" style="height: 589px; background-color: #FFFFFF;">
        <h1>Simbatik</h1>
        <!-- Other Simbatik content goes here -->
    </section>

    <!-- Section for Indah -->
    <section id="indah" style="height: 589px; background-color: #F5F7FA;">
        <h1>Indah</h1>
        <!-- Other Indah content goes here -->
    </section>
    

@endsection