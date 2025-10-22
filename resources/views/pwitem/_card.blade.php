<div class="col-sm-6">
    <div class="card border-default h-100">
        <div class="card-body">
            <h4 class="card-title">{{ $item->site }}</h4>
        </div>
        {{-- <div class="card-body">
            <p class="card-text">{{ $item->username }}</p>
        </div> --}}
        <div class="card-footer text-end">
            <form action="{{ url('pwitems/' . $item->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('pwitems/' . $item->slug) }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-eye"></i>
                    View
                </a>
                <a href="{{ url('pwitems/' . $item->slug . '/edit') }}" class="btn btn-outline-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <a href='#' onclick='this.parentNode.submit(); return false;'
                    class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i>
                </a>
            </form>
        </div>
    </div>
</div>
