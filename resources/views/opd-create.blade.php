
@extends('layouts.main')

@section('title', 'Add OPD')


@section('content')
    <section class="section-add-opd">
        <div class="container mt-4">
            <h1 data-aos="fade-up">Tambahkan OPD</h1>
            <form action="{{ route('opd.store') }}" method="POST" data-aos="fade-up">
                @csrf
                <div class="form-group mb-3">
                    <label for="full_name">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="position">Jabatan:</label>
                    <input type="text" class="form-control" id="position" name="position" required>
                </div>

                <div class="form-group mb-3">
                    <label for="institution">Nama Instansi/Dinas:</label>
                    <input type="text" class="form-control" id="institution" name="institution" required>
                </div>

                <div class="form-group mb-4">
                    <label for="phone_number">Nomor Telepon/WA:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('list-opd') }}" class="btn btn-secondary btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
