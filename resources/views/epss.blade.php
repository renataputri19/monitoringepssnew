@extends('layouts.main')

@section('title', 'EPSS')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section" style="background-color: #F5F7FA; height: 589px;">
        <div class="container">
            <h1>Evaluasi Penyelenggaraan Statistik Sektoral (EPSS)</h1>
            <p>Peraturan Badan Pusat Statistik Nomor 3 Tahun 2022...</p>
            <!-- Other hero content goes here -->
        </div>
    </div>

    @for ($i = 0; $i < 4; $i++)
        <section style="height: 589px; background-color: {{ $i % 2 == 0 ? '#FFFFFF' : '#F5F7FA' }};">
            <!-- Section content goes here -->
        </section>
    @endfor
    <!-- Rest of the page content -->
@endsection
