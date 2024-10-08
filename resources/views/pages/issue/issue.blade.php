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
                <h1>SIMAT - IT Complete</h1>
                @auth
                    <div class="section-header-button">
                        <a href="{{ route('deletedList') }}" class="btn btn-primary">Show Deleted Data</a>
                    </div>
                @endauth
            </div>
            <div class="section-body">
                @include('layouts.alert')
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="nama">
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
                                                <th>Teknisi</th>
                                                <th>Note</th>
                                                <th>End Date</th>
                                                @auth
                                                    <th>Action</th>
                                                @endauth
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($issue as $item)
                                                <tr>
                                                    <td>{{ $item->created_at->translatedFormat('d F Y H:i') }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->departemen['nama_departemen'] }}</td>
                                                    <td>{{ strip_tags($item->deskripsi) }}</td>
                                                    <td>
                                                        @foreach ($item->hardware as $hardware)
                                                            {{ $hardware['nama_hardware'] }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger">{{ ucfirst($item->status) }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($item->teknisi)
                                                            {{ $item->teknisi['nama_teknisi'] }}
                                                        @else
                                                            <span class="text-muted">No Teknisi Assigned</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->note)
                                                            {{ $item->note }}
                                                        @else
                                                            <span class="text-muted">No Note Assigned</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->updated_at->translatedFormat('d F Y H:i') }}</td>
                                                    @auth
                                                        <td>
                                                            <form action="{{ route('issue.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    @endauth
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav>
                                        {{ $issue->links() }}
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
