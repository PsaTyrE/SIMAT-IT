@extends('layouts.app')


@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('issue.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>SIMAT - IT Deleted List</h1>
            </div>
            <div class="section-body">
                <!-- Include alert section -->
                @include('layouts.alert')
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama">
                                            <input type="date" class="form-control" placeholder="Search"
                                                name="created_at">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>Start Date</th>
                                                <th>Nama</th>
                                                <th>Departemen</th>
                                                <th>Deskripsi</th>
                                                <th>Hardware</th>
                                                <th>Status</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deletedIssue as $item)
                                                <tr>
                                                    <td>{{ $item->created_at->translatedFormat('d F Y H:i') }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->departemen['nama_departemen'] }}</td>
                                                    <td>{{ strip_tags($item->deskripsi) }}</td>
                                                    <td>
                                                        @if ($item->hardware->isNotEmpty())
                                                            @foreach ($item->hardware as $hardware)
                                                                {{ $hardware->nama_hardware }}@if (!$loop->last)
                                                                    ,
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <span class="text-muted">No Hardware Assigned</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'open')
                                                            <span class="badge badge-success">Open</span>
                                                        @elseif ($item->status == 'onhold')
                                                            <span class="badge badge-warning">On Hold</span>
                                                        @else
                                                            <span class="badge badge-danger">Complete</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->updated_at->translatedFormat('d F Y H:i') }}</td>
                                                    <td>
                                                        <form action="{{ route('restore', $item->id) }}" method="GET"
                                                            style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-warning"
                                                                onclick="return confirm('Are you sure you want to restore this item?')">Restore</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav>
                                        {{ $deletedIssue->links() }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
