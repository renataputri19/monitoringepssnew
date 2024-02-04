
@extends('layouts.main')

@section('title', 'Prinsip SDI')

@section('content')
    <!-- Hero Section for Beranda -->
    <section style="height: 589px; background-color: #F5F7FA;">
        <div class="hero-section" style="background-color: #F5F7FA; height: 589px;">
            <div class="container">
                <h1>Prinsip SDI</h1>
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
                                <option value="sds1">Tingkat Kematangan Penerapan Standar Data Statistik (SDS)</option>
                                <option value="sds2">Tingkat Kematangan Penerapan Metadata Statistik</option>
                                <option value="sds3">Tingkat Kematangan Penerapan Interoperabilitas Data</option>
                                <option value="sds4">Tingkat Kematangan Penerapan Kode Referensi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tingkat">Tingkat:</label>
                            <select id="tingkat" name="tingkat" class="form-control">
                                <option value="tingkat1">Tingkat 1</option>
                                <option value="tingkat2">Tingkat 2</option>
                                <option value="tingkat3">Tingkat 3</option>
                                <option value="tingkat4">Tingkat 4</option>
                                <option value="tingkat5">Tingkat 5</option>
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
