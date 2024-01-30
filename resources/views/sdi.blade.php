
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
                        <input type="hidden" name="disetujui" value="0">
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
                    <h2>{{ $indikatorTitles[$indikator] }}</h2> {{-- Make sure to define $indikatorTitles array with proper titles --}}
                </div>
                @foreach(['tingkat1', 'tingkat2', 'tingkat3', 'tingkat4', 'tingkat5'] as $tingkat)
                    <div class="col">
                        <h2>{{ $tingkatTitles[$tingkat]  }}</h2>
                        @if(isset($files[$indikator][$tingkat]))
                            @foreach($files[$indikator][$tingkat] as $file)
                                <a href="{{ asset('/storage/'.$file->filename) }}">Download File</a><br>
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