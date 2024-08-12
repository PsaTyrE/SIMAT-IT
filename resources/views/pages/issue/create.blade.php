@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('issueToday') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>

            <div class="section-body">

                <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('issue.store') }}" method="post">
                                    @csrf
                                    <div class="form-group row mt-4">
                                        <label for="nama"
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" id="nama" value="{{ old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <label for="departemenID"
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Departemen</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select
                                                class="form-control selectric @error('departemenID') is-invalid @enderror"
                                                name="departemenID" id="departemenID">
                                                <option value="">Select One</option>
                                                @foreach ($departemen as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('departemenID') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_departemen }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('departemenID')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="deskripsi"
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="deskripsi" id="deskripsi" class="summernote-simple @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <label for="hardwareID"
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hardware</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control select2 @error('hardwareID') is-invalid @enderror"
                                                multiple="" name="hardwareID[]" id="hardwareID">
                                                @foreach ($hardware as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ in_array($item->id, old('hardwareID', [])) ? 'selected' : '' }}>
                                                        {{ $item->nama_hardware }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('hardwareID')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="col-sm-12 col-md-7 offset-md-3">
                                            <button class="btn btn-primary" name="submit">Save</button>
                                        </div>
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
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.selectric').selectric();
            $('.select2').select2();
            $('.summernote-simple').summernote({
                toolbar: [

                ]
            });
        });
    </script>
@endpush
