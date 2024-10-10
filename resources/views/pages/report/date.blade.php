{{-- <form action="{{ route('report.date.pdf') }}" method="POST">
    @csrf
    <label for="start_date">Pilih Tanggal Mulai:</label>
    <input type="date" id="start_date" name="start_date" required>

    <label for="end_date">Pilih Tanggal Akhir:</label>
    <input type="date" id="end_date" name="end_date" required>

    <button type="submit">Cetak Laporan</button>
</form> --}}
<!-- resources/views/pages/report/date.blade.php -->
@extends('layouts.app')

@section('title', 'Laporan Selesai Pertanggal')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Selesai Pertanggal</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Pilih Rentang Tanggal untuk Laporan</h2>
                <p class="section-lead">
                    Pilih rentang tanggal di bawah ini untuk mencetak laporan issue yang telah selesai.
                </p>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pilih Rentang Tanggal</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('report.date.pdf') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="start_date">Tanggal Mulai</label>
                                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Tanggal Selesai</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
