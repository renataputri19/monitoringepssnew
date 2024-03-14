
@extends('layouts.main')

@section('title', 'Proses Bisnis Statistik')


@section('content')

    <section class="section-hero-domain" style="background-color: #F5F7FA;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="domain-title text-center">Proses Bisnis Statistik</h1>
                    <p class="domain-text">
                        Pengenalan tahapan-tahapan dalam proses bisnis penyelenggaraan kegiatan statistik yang biasa disebut sebagai Generic Statistical Business Process Model (GSBPM).
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
                        <input type="hidden" name="domain" value="pbs">
                        <input type="hidden" name="aspek" value="Perencanaan Data">
                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                    </form>
    
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container mt-3 mb-3">
            <div class="accordion" id="accordionExample">
                @foreach(array_chunk(['pbs1', 'pbs2', 'pbs3', 'pbs4','pbs5', 'pbs6', 'pbs7'], 1) as $chunkIndex => $indikatorChunk)
                    @foreach($indikatorChunk as $index => $indikator)
                        @php
                            $indikatorApproval = \App\Models\IndikatorApproval::where('indikator', $indikator)->first();
                            $accordionId = "collapse-" . $loop->parent->index . "-" . $loop->index;
                        @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $accordionId }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $accordionId }}" aria-expanded="false" aria-controls="{{ $accordionId }}">
                                    <h4>{{ $loop->parent->iteration }}. {{ $indikatorTitles[$indikator] ?? 'Unknown Title' }}</h4>
                                </button>
                            </h2>
                            <div id="{{ $accordionId }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $accordionId }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @include('partials.indikator_approval_status', ['indikatorApproval' => $indikatorApproval])
                                    @include('partials.indikator_approval_form_pbs', ['indikator' => $indikator])

                                    @foreach(['tingkat1', 'tingkat2','tingkat3','tingkat4', 'tingkat5'] as $tingkat)
                                        @include('partials.file_item', ['files' => $files[$indikator][$tingkat] ?? [], 'tingkat' => $tingkat])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- At the bottom of your Blade file that lists the files -->
    @include('partials.approval_modal')



@endsection
