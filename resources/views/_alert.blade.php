@if (session('success'))
    <div class="row g-2 mt-3">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success', 'Success !') }}
            </div>
        </div>
    </div>
@endif
@if (session('fail'))
    <div class="row g-2 mt-3">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                {{ session('fail', 'Fail !') }}
            </div>
        </div>
    </div>
@endif
