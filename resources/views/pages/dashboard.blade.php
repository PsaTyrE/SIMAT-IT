@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Panduan Penggunaan SIMAT - IT</h1>
            </div>
            <div class="row">
                <!-- Add your statistic cards here -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-3 col-md-12">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    SIMAT - IT
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                Menu SIMAT - IT, Digunakan untuk Pelaporan dari Semua Unit ketika mengalami
                                                Permasalahan, Permintaan ataupun Perbaikan IT diantaranya HARDWARE,
                                                SOFTWARE, NETWORK, KOMUNIKASI, SECURITY SYSTEM ke Unit IT.
                                                <br>
                                                <strong>Cara Penggunaan:</strong>
                                                <ol>
                                                    <li>Pilih dan klik Menu SIMAT - IT</li>
                                                    <li>Setelah tampil Form MAINTENANCE/REQUEST/TROUBLE - IT, isi Nama
                                                        Pelapor dan pilih Departemen/Unit Pelapor Serta isikan Deskripsi
                                                        Detail Kendala yang terjadi pada input Description.</li>
                                                    <li>Setelah terisi semua tekan/pilih tombol SAVE</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    Data SIMAT - IT Today
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                Menu Data SIMAT - IT Today, Digunakan untuk melihat Data Pelaporan Dari Unit
                                                yang sudah di Input ke SI SIMAT - IT pada Hari ini dengan Status Open dan In
                                                Progress.
                                                <br>
                                                <strong>Cara Penggunaan:</strong>
                                                <ol>
                                                    <li>Pilih dan klik Menu Data SIMAT - IT Today</li>
                                                    <li>Untuk mencari Data SIMAT - IT Today isikan keyword pencarian pada
                                                        Search</li>
                                                    <li>Untuk Status Open, Merupakan Pelaporan Awal dari Unit sesudah Input
                                                        di SI SIMAT - IT dan Belum di Konfirmasi Oleh Petugas IT, Status In
                                                        Progress, Pelaporan yang di input sudah di konfirmasi dan dalam
                                                        proses pengerjaan oleh Petugas IT, Status Complete menadakan
                                                        Pelaporan dari Unit telah selesai di kerjakan oleh Petugas IT</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    Data SIMAT - IT Complete
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                Menu Data SIMAT - IT Complete All, Digunakan untuk melihat Semua Data
                                                Pelaporan Dari Unit yang sudah selesai di kerjakan oleh Petugas IT dengan
                                                Status Complete.
                                                <br>
                                                <strong>Cara Penggunaan:</strong>
                                                <ol>
                                                    <li>Pilih dan klik Menu Data SIMAT - IT All</li>
                                                    <li>Untuk mencari Data SIMAT - IT Today isikan keyword pencarian pada
                                                        Search</li>
                                                    <li>Untuk Status Open, Merupakan Pelaporan Awal dari Unit sesudah Input
                                                        di SI SIMAT - IT dan Belum di Konfirmasi Oleh Petugas IT, Status In
                                                        Progress, Pelaporan yang di input sudah di konfirmasi dan dalam
                                                        proses pengerjaan oleh Petugas IT, Status Complete menadakan
                                                        Pelaporan dari Unit telah selesai di kerjakan oleh Petugas IT</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End of accordion -->
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End of row -->
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
