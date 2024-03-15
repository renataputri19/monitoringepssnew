
@extends('layouts.main')

@section('title', 'List OPD')

@section('content')


    <section class="section-hero-domain" style="background-color: #F5F7FA;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <h1 class="domain-title text-center">Pendataan Organisasi Perangkat Daerah (OPD)</h1>
                <p class="domain-text">
                    List OPD ini dirancang sebagai database interaktif yang menampung informasi kontak penting dari berbagai instansi pemerintah daerah. Database ini bertujuan untuk menyederhanakan dan mempercepat proses komunikasi antar-instansi, khususnya dalam konteks peningkatan nilai Evaluasi Penyelenggaraan Statistik Sektoral (EPSS) untuk tahun 2024. Dengan mengintegrasikan data kontak yang mudah diakses dan diperbarui, setiap instansi dapat dengan cepat mengidentifikasi dan menghubungi pihak terkait untuk berkolaborasi, berdiskusi, dan menyelesaikan kebutuhan informasi atau data yang diperlukan dalam rangka meningkatkan kualitas pengelolaan data statistik mereka.
                </p>
            </div>
        </div>
    </div>
    </section>

    <section class="section-list-opd" aria-labelledby="list-opd-heading">

        <div class="container mt-2">
            <div class="mb-2 text-center">
                <a href="{{ route('opd.create') }}" class="btn btn-success" role="button" data-aos="fade-up">Tambahkan OPD</a>
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
