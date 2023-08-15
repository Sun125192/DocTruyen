@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
