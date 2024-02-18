
@extends('layouts.main')

@section('title', 'List OPD')

@section('content')

    <section class="section-list-opd" aria-labelledby="list-opd-heading">

        <div class="container mt-5">
            <h2 id="list-opd-heading" data-aos="fade-up">List OPD</h2>
            <div class="mb-2 text-center">
                <a href="{{ route('opd.create') }}" class="btn btn-success" role="button" data-aos="fade-up">Add New</a>
            </div>
            <div class="table-responsive" data-aos="fade-up">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Nama Instansi/Dinas</th>
                            <th scope="col">Nomor Telepon/WA</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($opds as $opd)
                            <tr>
                                <td>{{ $opd->full_name }}</td>
                                <td>{{ $opd->position }}</td>
                                <td>{{ $opd->institution }}</td>
                                <td>{{ $opd->phone_number }}</td>
                                <td>
                                    <a href="{{ route('opd.edit', $opd->id) }}" class="btn btn-primary role="button">Update</a>
                                    <form action="{{ route('opd.destroy', $opd->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No OPDs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>


@endsection
