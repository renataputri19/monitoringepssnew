
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
                            <input type="file" name="files[]" class="form-control" id="file-sds" multiple required>
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
                        
                                        <div class="col-md-6">
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
                </div>
            </div>


    


    

    <div class="container">
        @foreach(['sds1', 'sds2', 'sds3', 'sds4'] as $indikator)
            
            <div class="row">
                <div class="col">
                    <h2>{{ $indikatorTitles[$indikator] }}</h2>
                    {{-- Check if the indikator is already approved or not --}}
                    @php
                    $indikatorApproval = \App\Models\IndikatorApproval::where('indikator', $indikator)->first();
                    @endphp
                    
                    @if($indikatorApproval)
                        <p>Status: {{ $indikatorApproval->disetujui ? 'Disetujui' : 'Tidak Disetujui' }}</p>
                        
                        <p>Tingkat: {{ $indikatorApproval->tingkat }}</p>
                        
                        <p>Alasan: {{ $indikatorApproval->reason ?? 'N/A' }}</p>
                    
                        <form action="{{ route('indikator.approve') }}" method="POST">
                            @csrf
                            <input type="hidden" name="indikator" value="{{ $indikator }}">
                            <input type="hidden" name="domain" value="sdi">
                            <input type="hidden" name="aspek" value="Standar Data Statistik">
                            {{-- Approval/Disapproval Selection --}}
                            <div>
                                <input type="radio" id="approve" name="disetujui" value="1" checked>
                                <label for="approve">Setujui</label><br>
                                <input type="radio" id="disapprove" name="disetujui" value="0">
                                <label for="disapprove">Tidak Setujui</label><br>
                            </div>
                            {{-- Tingkat Selection --}}
                            <select name="tingkat">
                                <option value="1">Tingkat 1</option>
                                <option value="2">Tingkat 2</option>
                                <option value="3">Tingkat 3</option>
                                <option value="4">Tingkat 4</option>
                                <option value="5">Tingkat 5</option>
                                {{-- ... other options ... --}}
                            </select>
                            <textarea name="reason" placeholder="Alasan (opsional)"></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                    
                </div>
                @foreach(['tingkat1', 'tingkat2', 'tingkat3', 'tingkat4', 'tingkat5'] as $tingkat)
                    <div class="col">
                        <h3>{{ $tingkatTitles[$tingkat] }}</h3>
                        @if(isset($files[$indikator][$tingkat]) && count($files[$indikator][$tingkat]) > 0)
                            @foreach($files[$indikator][$tingkat] as $file)
                                <div>
                                    <a href="{{ asset('/storage/'.$file->filename) }}">Download File</a><br>
                                    {{-- Menampilkan status --}}
                                    <span>
                                        @if($file->disetujui === null)
                                            Diperiksa
                                        @elseif($file->disetujui)
                                            Disetujui
                                            @if($file->reason) {{-- Only display reason if it's not null --}}
                                                <p>Alasan: {{ $file->reason }}</p>
                                            @endif
                                        @else
                                            Tidak Disetujui
                                            @if($file->reason) {{-- Only display reason if it's not null --}}
                                                <p>Alasan: {{ $file->reason }}</p>
                                            @endif
                                        @endif
                                    </span>
                                    @if(Auth::check() && Auth::user()->admin)
                                    <form method="post" action="{{ route('file.approve', $file->id) }}">
                                        @csrf
                                        <textarea name="reason" placeholder="Enter reason for approval (optional)"></textarea>
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form method="post" action="{{ route('file.disapprove', $file->id) }}">
                                        @csrf
                                        <textarea name="reason" placeholder="Enter reason for disapproval" required></textarea>
                                        <button type="submit" class="btn btn-warning">Disapprove</button>
                                    </form>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <span>No files</span>
                        @endif
                    </div>
                @endforeach
            </div>

            
            
        @endforeach
    </div>


    

    <section style="height: 45px; background-color: #F5F7FA;">
        {{-- <h1>Romantik</h1> --}}
        <!-- Other Romantik content goes here -->
    </section>



@endsection



