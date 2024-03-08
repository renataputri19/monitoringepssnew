
@extends('layouts.main')

@section('title', 'Prinsip SDI')


@section('content')


    <section class="section-hero-domain" style="background-color: #F5F7FA;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="domain-title text-center">Prinsip SDI</h1>
                    <p class="domain-text"> Berdasarkan Peraturan Presiden Republik Indonesia Nomor 39 Tahun 2019 Tentang Satu Data Indonesia,
                        Satu Data Indonesia adalah kebijakan tata kelola data pemerintah untuk menghasilkan data yang akurat, mutakhir, terpadu, dan dapat dipertanggungjawabkan, serta mudah diakses dan dibagipakaikan antar instansi pusat dan instansi daerah melalui pemenuhan standar data, metadata, interoperabilitas data, dan menggunakan kode referensi dan data induk. 
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="section-indikator">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <!-- Centered Column for Form -->
                <div class="col-md-8">
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data" class="form-indikator">
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
                            <input type="file" name="files[]" class="form-control" id="file" multiple required>
                            @error('files.*')
                                <div class="alert alert-danger mt-1">
                                    <p> File Harus PDF and maks 10mb </p>
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="domain" value="sdi">
                        <input type="hidden" name="aspek" value="Standar Data Statistik">
                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    




            {{-- SINI JAGNAN GANGGU --}}
            {{-- SINI JAGNAN GANGGU --}}
            {{-- SINI JAGNAN GANGGU --}}
            {{-- SINI JAGNAN GANGGU --}}

            {{-- SINI JAGNAN GANGGU --}}
            {{-- SINI JAGNAN GANGGU --}}
            {{-- SINI JAGNAN GANGGU --}}
            {{-- SINI JAGNAN GANGGU --}}
            {{-- SINI JAGNAN GANGGU --}}


    <section>
        <div class="container mt-3">
            <div id="indikatorCarousel" class="carousel slide" data-interval="false" data-aos="fade-up">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    @foreach(array_chunk(['sds1', 'sds2', 'sds3', 'sds4'], 2) as $chunkIndex => $indikatorChunk)
                        <button type="button" data-bs-target="#indikatorCarousel" data-bs-slide-to="{{ $chunkIndex }}" class="{{ $chunkIndex == 0 ? 'active' : '' }}" aria-current="{{ $chunkIndex == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $chunkIndex + 1 }}"></button>
                    @endforeach
                </div>
        
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach(array_chunk(['sds1', 'sds2', 'sds3', 'sds4'], 2) as $chunkIndex => $indikatorChunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}" data-interval="false">
                            <div class="row mb-4">
                                @foreach($indikatorChunk as $index => $indikator)
                                    @php
                                    $indikatorApproval = \App\Models\IndikatorApproval::where('indikator', $indikator)->first();
                                    // $backgroundColor = $index % 2 === 0 ? '#F5F7FA' : '#FFFFFF';
                                    @endphp
                    
                                    <div class="col-xxl-6">
                                        <div class="card mt-4">
                                            <div class="card-header">
                                                <h2 style="text-align: center;">{{ $indikatorTitles[$indikator] }}</h2>
                                            </div>
                                            <div class="card-body">
                                                @include('partials.indikator_approval_status', ['indikatorApproval' => $indikatorApproval])
                                                @include('partials.indikator_approval_form_sdi', ['indikator' => $indikator])

                                                @foreach(['tingkat1', 'tingkat2','tingkat3','tingkat4', 'tingkat5'] as $tingkat)
                                                    @include('partials.file_item', ['files' => $files[$indikator][$tingkat] ?? [], 'tingkat' => $tingkat])
                                                @endforeach
                                                                                                                                            
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
            </div>
        </div>
    </section>

    <!-- At the bottom of your Blade file that lists the files -->
    @include('partials.approval_modal')
    


    

        

    <section style="height: 45px; background-color: #F5F7FA;">
        {{-- <h1>Romantik</h1> --}}
        <!-- Other Romantik content goes here -->
    </section>



@endsection



