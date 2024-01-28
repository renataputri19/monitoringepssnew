
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

    <!-- Section for Tentang EPSS -->
    <section style="height: 900px; background-color: #FFFFFF;">
        <div class="container mt-4">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <h2>Tingkat Kematangan Penerapan Standar Data Statistik (SDS)</h2>
                    <h4>Tingkat 2</h4>
                    <!-- Add your list items here -->
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="file" >Upload file:</label>
                          <input type="file" name="files[]" class="form-control" id="sds2" multiple required>
                          <input type="hidden" name="domain" value="sdi">
                          <input type="hidden" name="aspek" value="Standar Data Statistik">
                          <input type="hidden" name="indikator" value="Tingkat Kematangan Penerapan Standar Data Statistik (SDS)">
                          <input type="hidden" name="tingkat" value="2">
                          <input type="hidden" name="disetujui" value=0>
                        </div>
                        <button type="submit">Upload</button>
                    </form>

                    <div>
                        <h1>file upload disini</h1>
                        <div>
                            @foreach ($file as $item)
                                <div>
                                    <p>{{ $item->tingkat }}</p>
                                    {{-- <img width="200" src="{{ asset('/storage/'.$item->filename) }}" alt=""> --}}
                                    <a href="{{ asset('/storage/'.$item->filename) }}">Link</a>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <h4>Tingkat 3</h4>
                    <!-- Add your list items here -->
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="file" >Upload file:</label>
                          <input type="file" name="files[]" class="form-control" id="sds3" multiple required>
                          <input type="hidden" name="domain" value="sdi">
                          <input type="hidden" name="aspek" value="Standar Data Statistik">
                          <input type="hidden" name="indikator" value="Tingkat Kematangan Penerapan Standar Data Statistik (SDS)">
                          <input type="hidden" name="tingkat" value="3">
                          <input type="hidden" name="disetujui" value=0>
                        </div>
                        <button type="submit">Upload</button>
                    </form>

                    <div>
                        <h1>file upload disini</h1>
                    </div>

                    <h4>Tingkat 4</h4>
                    <!-- Add your list items here -->
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="file" >Upload file:</label>
                          <input type="file" name="files[]" class="form-control" id="sds4" multiple required>
                          <input type="hidden" name="domain" value="sdi">
                          <input type="hidden" name="aspek" value="Standar Data Statistik">
                          <input type="hidden" name="indikator" value="Tingkat Kematangan Penerapan Standar Data Statistik (SDS)">
                          <input type="hidden" name="tingkat" value="4">
                          <input type="hidden" name="disetujui" value=0>
                        </div>
                        <button type="submit">Upload</button>
                    </form>

                    <div>
                        <h1>file upload disini</h1>
                    </div>

                    <h4>Tingkat 5</h4>
                    <!-- Add your list items here -->
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="file" >Upload file:</label>
                          <input type="file" name="files[]" class="form-control" id="sds5" multiple required>
                          <input type="hidden" name="domain" value="sdi">
                          <input type="hidden" name="aspek" value="Standar Data Statistik">
                          <input type="hidden" name="indikator" value="Tingkat Kematangan Penerapan Standar Data Statistik (SDS)">
                          <input type="hidden" name="tingkat" value="5">
                          <input type="hidden" name="disetujui" value=0>
                        </div>
                        <button type="submit">Upload</button>
                    </form>

                    <div>
                        <h1>file upload disini</h1>
                    </div>
                </div>
                
                <!-- Column 2 -->
                {{-- <div class="col-md-6">
                    <h3>Tingkat Kematangan Penerapan Metadata Statistik</h3>
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="mb-3">
                                <!-- Assuming you have a separate title input for each file -->
                                <input type="text" name="titles[]" class="form-control" placeholder="Title for Tingkat {{ $i }}">
                                <input type="file" name="files[]" class="form-control" multiple>
                            </div>
                        @endfor
                        <button type="submit" class="btn btn-primary">Upload Files</button>
                    </form>
                </div> --}}





            </div>
        </div>
        
    </section>

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
