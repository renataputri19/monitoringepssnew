@extends('layouts.main')

@section('title', 'Edit OPD')

<head>
    <!-- Other head content -->
    <link href="{{ asset('css/list-opd.css') }}" rel="stylesheet">
</head>

@section('content')
<div class="container mt-4">
    <h1>Edit OPD</h1>
    <form action="{{ route('opd.update', $opd->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="full_name">Nama Lengkap:</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $opd->full_name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="position">Jabatan:</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $opd->position }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="institution">Nama Instansi/Dinas:</label>
            <input type="text" class="form-control" id="institution" name="institution" value="{{ $opd->institution }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="phone_number">Nomor Telepon/WA:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $opd->phone_number }}" required>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success btn-opd">Update</button>
                <a href="{{ route('list-opd') }}" class="btn btn-secondary btn-cancel">Cancel</a>

            </div>
        </div>
    </form>
</div>
@endsection
