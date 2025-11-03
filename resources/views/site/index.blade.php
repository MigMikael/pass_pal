@extends('layout')

@section('title', 'Password Items')

@section('specific-style')
    <style>
        input[type='search']::-webkit-search-cancel-button {
            filter: grayscale(1);
        }
    </style>
@endsection

{{-- @section('specific-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search)
            const isExpired = urlParams.has('expired')

            if (isExpired) {
                alert("To keep your passwords safe, PassPal locks after 5 minutes of inactivity")
            }
        }, false);
    </script>
@endsection --}}

@section('content')
    @include('_alert')
    <div class="row g-2 mt-3 mb-3">
        <div class="col-9">
            <form action="{{ url('/pass-pal/sites/search') }}" method="GET">
                <div class="input-group shadow-sm">
                    <input type="search" class="form-control" placeholder="Search" name="query"
                        value="{{ request()->get('query', '') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-3 d-grid">
            <a href="{{ url('/pass-pal/pwitems/create') }}" class="btn btn-primary btn-block shadow-sm">
                <i class="bi bi-plus"></i>
                Add
            </a>
        </div>
    </div>
    <hr>
    <div class="row g-2 mt-3 mb-3">
        <div class="col-12">
            <div class="list-group shadow-sm">
                @foreach ($sites as $site)
                    <a href="{{ url('/pass-pal/sites/' . $site->slug) }}"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <p>{{ $site->name }}</p>
                        <span>
                            <i class="bi bi-arrow-right-circle"></i>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row g-2 mt-3 mb-3 justify-content-center">
        <div class="col-12">
            {{ $sites->links() }}
        </div>
    </div>
@endsection
