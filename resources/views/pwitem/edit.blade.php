@extends('layout')

@section('title', 'Edit Password Item')

@section('content')
    <div class="row g-2 mt-3 mb-3">
        <div class="col-12">
            <form action="{{ url('/pass-pal/pwitems/' . $pwItem->slug) }}" method="POST">
                <div class="card shadow-sm rounded-4">
                    <div class="card-header">
                        <h2 class="mt-3 mb-3">Edit: {{ $pwItem->site->name }}</h2>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-3">
                            <label for="site" class="form-label">
                                <strong>Site:</strong>
                            </label>
                            <input type="text" class="form-control" id="site" placeholder="" name="site"
                                value="{{ $pwItem->site->name }}" list="sites" autocapitalize="off" autocomplete="off">
                            <datalist id="sites">
                                @foreach ($siteOptions as $site)
                                    <option value="{{ $site->name }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="mb-3">
                            <label for="site" class="form-label">
                                <strong>Username:</strong>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="username" placeholder=""
                                name="username" value="{{ $pwItem->username }}" autocapitalize="off" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="site" class="form-label">
                                <strong>Password:</strong>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="password" placeholder=""
                                name="password" value="{{ $pwItem->password }}" autocapitalize="off" autocomplete="off">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="note" class="form-label">
                                <strong>Note:</strong>
                            </label>
                            <textarea class="form-control" rows="3" id="note" name="note">{{ $pwItem->note }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <div class="row mt-3 ms-1 me-1 mb-3">
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
