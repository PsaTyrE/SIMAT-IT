@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            <p>{{ session('error') }}</p>
        </div>
    </div>
@endif
