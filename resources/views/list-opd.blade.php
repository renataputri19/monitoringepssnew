
@extends('layouts.main')

@section('title', 'List OPD')

<head>
    <!-- Other head content -->
    <link href="{{ asset('css/list-opd.css') }}" rel="stylesheet">
</head>


@section('content')
    <div class="container mt-5">
        <h2>List OPD</h2>
        <div class="mb-2">
            <a href="{{ route('opd.create') }}" class="btn btn-success">Add New</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Nama Instansi/Dinas</th>
                    <th>Nomor Telepon/WA</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opds as $opd)
                    <tr>
                        <td>{{ $opd->full_name }}</td>
                        <td>{{ $opd->position }}</td>
                        <td>{{ $opd->institution }}</td>
                        <td>{{ $opd->phone_number }}</td>
                        <td>
                            <a href="{{ route('opd.edit', $opd->id) }}" class="btn btn-primary">Update</a>
                            <form action="{{ route('opd.destroy', $opd->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection