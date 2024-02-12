
@extends('layouts.main')

@section('title', 'Kelembagaan')

<head>
    <!-- Other head content -->
    <link href="{{ asset('css/carousel-style.css') }}" rel="stylesheet">
</head>

@section('content')
    <!-- Hero Section for Beranda -->
    <section style="height: 589px; background-color: #F5F7FA;">
        <div class="hero-section" style="background-color: #F5F7FA; height: 589px;">
            <div class="container">
                <h1>Kelembagaan</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <!-- Other hero content goes here -->
            </div>
        </div>
    </section>


    <section style="height: 900px; background-color: #FFFFFF;">
        <div class="container mt-4">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="indikator">Indikator:</label>
                            <select id="indikator" name="indikator" class="form-control">
                                @foreach($indikatorTitles as $key => $title)
                                    <option value="{{ $key }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tingkat">Tingkat:</label>
                            <select id="tingkat" name="tingkat" class="form-control">
                                @foreach($tingkatTitles as $key => $title)
                                    <option value="{{ $key }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Upload file:</label>
                            <input type="file" name="files[]" class="form-control" id="file-sds" multiple required>
                        </div>
                        <input type="hidden" name="domain" value="kualitas-data">
                        <input type="hidden" name="aspek" value="Relevansi">
                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                    </form>
    
                    {{-- <div class="uploaded-files mt-4">
                        <h2>File yang Diupload</h2>
                        @foreach ($file as $item)
                            <div class="file-item">
                                <p>{{ $item->tingkat }}</p>
                                <a href="{{ asset('/storage/'.$item->filename) }}">Download File</a>
                            </div>
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-3">
        <div id="indikatorCarousel" class="carousel slide" data-interval="false">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach(array_chunk(['kelembagaan1', 'kelembagaan2', 'kelembagaan3', 'kelembagaan4','kelembagaan5', 'kelembagaan6', 'kelembagaan7', 'kelembagaan8','kelembagaan9', 'kelembagaan10'], 2) as $chunkIndex => $indikatorChunk)
                    <button type="button" data-bs-target="#indikatorCarousel" data-bs-slide-to="{{ $chunkIndex }}" class="{{ $chunkIndex == 0 ? 'active' : '' }}" aria-current="{{ $chunkIndex == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $chunkIndex + 1 }}"></button>
                @endforeach
            </div>
    
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach(array_chunk(['kelembagaan1', 'kelembagaan2', 'kelembagaan3', 'kelembagaan4','kelembagaan5', 'kelembagaan6', 'kelembagaan7', 'kelembagaan8','kelembagaan9', 'kelembagaan10'], 2) as $chunkIndex => $indikatorChunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}" data-interval="false">
                        <div class="row mb-4">
                            @foreach($indikatorChunk as $index => $indikator)
                                @php
                                $indikatorApproval = \App\Models\IndikatorApproval::where('indikator', $indikator)->first();
                                // $backgroundColor = $index % 2 === 0 ? '#F5F7FA' : '#FFFFFF';
                                @endphp
                
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 style="text-align: center;">{{ $indikatorTitles[$indikator] }}</h2>
                                        </div>
                                        <div class="card-body">
                                            @include('partials.indikator_approval_status', ['indikatorApproval' => $indikatorApproval])
                                            @include('partials.indikator_approval_form_kelembagaan', ['indikator' => $indikator])
                                        
                                            <div class="row my-3">
                                                <div class="col-md-6">
                                                    {{-- <h3>Files Tingkat 1-2</h3> --}}
                                                    @foreach(['tingkat1', 'tingkat2'] as $tingkat)
                                                        @include('partials.file_item', ['files' => $files[$indikator][$tingkat] ?? [], 'tingkat' => $tingkat])
                                                    @endforeach
                                                </div>
                                                <div class="col-md-6">
                                                    {{-- <h3>Files Tingkat 3-5</h3> --}}
                                                    @foreach(['tingkat3','tingkat4', 'tingkat5'] as $tingkat)
                                                        @include('partials.file_item', ['files' => $files[$indikator][$tingkat] ?? [], 'tingkat' => $tingkat])
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
    
            <!-- Controls -->
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#indikatorCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#indikatorCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
    </div>

    <section style="height: 589px; background-color: #F5F7FA;">
        {{-- <h1>Romantik</h1> --}}
        <!-- Other Romantik content goes here -->
    </section>


 <!-- Include Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
 <script src="{{ asset('js/carousel-js.js') }}"></script>



    
    {{-- <!-- Section for Romantik -->
    <section style="height: 589px; background-color: #F5F7FA;">
        <h1>Romantik</h1>
        <!-- Other Romantik content goes here -->
    </section>

    <!-- Section for Simbatik -->
    <section style="height: 589px; background-color: #FFFFFF;">
        <h1>Simbatik</h1>
        <!-- Other Simbatik content goes here -->
    </section>

    <!-- Section for Indah -->
    <section style="height: 589px; background-color: #F5F7FA;">
        <h1>Indah</h1>
        <!-- Other Indah content goes here -->
    </section>

    <!-- Section for Hubungi Kami -->
    <section style="height: 589px; background-color: #FFFFFF;">
        <h1>Hubungi Kami</h1>
        <!-- Other Hubungi Kami content goes here -->
    </section> --}}

@endsection
