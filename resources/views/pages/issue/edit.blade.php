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
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Advanced Forms</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>
                <form action="{{ route('issue.update', $issue->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Issue Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama', $issue->nama) }}" disabled>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="departemen">Departemen</label>
                                        <select name="departemenID"
                                            class="form-control @error('departemenID') is-invalid @enderror" id="departemen"
                                            disabled>
                                            <option value="{{ $issue->departemen->id }}">
                                                {{ $issue->departemen['nama_departemen'] }}
                                            </option>
                                            @foreach ($departemen as $kls)
                                                <option value="{{ $kls->id }}"
                                                    {{ old('departemenID', $issue->departemenID) == $kls->id ? 'selected' : '' }}>
                                                    {{ $kls->nama_departemen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departemenID')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror"
                                            id="status">
                                            <option value="open"
                                                {{ old('status', $issue->status) == 'open' ? 'selected' : '' }}>Open
                                            </option>
                                            <option value="onhold"
                                                {{ old('status', $issue->status) == 'onhold' ? 'selected' : '' }}>On Hold
                                            </option>
                                            <option value="complete"
                                                {{ old('status', $issue->status) == 'complete' ? 'selected' : '' }}>
                                                Complete
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="teknisiID">Teknisi</label>
                                        <select class="form-control @error('teknisiID') is-invalid @enderror"
                                            name="teknisiID" id="teknisiID">
                                            <option value="">Select One</option>
                                            @foreach ($teknisi as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $issue->teknisiID == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_teknisi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('teknisiID')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="floatingTextarea2">Deskripsi</label>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px" name="deskripsi" disabled>{{ old('deskripsi', strip_tags($issue->deskripsi)) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="floatingTextarea2">Note Teknisi</label>
                                            <textarea class="form-control @error('note') is-invalid @enderror" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px" name="note"></textarea>
                                            @error('note')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="updated_at_date">Updated Date</label>
                                            <input type="date"
                                                class="form-control @error('updated_at_date') is-invalid @enderror"
                                                id="updated_at_date" name="updated_at_date"
                                                value="{{ old('updated_at_date', $updatedAtDate) }}">
                                            @error('updated_at_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="updated_at_time">Updated Time</label>
                                            <input type="time"
                                                class="form-control @error('updated_at_time') is-invalid @enderror"
                                                id="updated_at_time" name="updated_at_time"
                                                value="{{ old('updated_at_time', $updatedAtTime) }}">
                                            @error('updated_at_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hardwareID">Hardware</label>
                                        <select class="form-control select2 @error('hardwareID') is-invalid @enderror"
                                            multiple="" name="hardwareID[]" id="hardwareID" disabled>
                                            @foreach ($hardware as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ in_array($item->id, old('hardwareID', $issue->hardware->pluck('id')->toArray())) ? 'selected' : '' }}>
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
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
