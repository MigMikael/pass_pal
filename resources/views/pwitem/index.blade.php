@extends('layout')

@section('title', 'Password Items')

@section('specific-style')
    <style>
        input[type='search']::-webkit-search-cancel-button {
            filter: grayscale(1);
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="row g-2 mt-3">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success', 'Success !') }}
                </div>
            </div>
        </div>
    @endif
    @if (session('fail'))
        <div class="row g-2 mt-3">
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('fail', 'Fail !') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row g-2 mt-3 mb-3">
        <div class="col-9">
            <form action="{{ url('pwitems/search') }}" method="GET">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search" name="query"
                        value="{{ request()->get('query', '') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-3 d-grid">
            <a href="{{ url('pwitems/create') }}" class="btn btn-primary btn-block">
                <i class="bi bi-plus"></i>
                Add
            </a>
        </div>
    </div>
    <hr>
    <div class="row g-2 mb-3 mb-3">
        @foreach ($pwItems as $item)
            @include('pwitem._card', ['item' => $item])
        @endforeach
    </div>
    <div class="row g-2 mb-3 mb-3">
        <div class="col-12 text-center">
            {{ $pwItems->links() }}
        </div>
    </div>
@endsection
