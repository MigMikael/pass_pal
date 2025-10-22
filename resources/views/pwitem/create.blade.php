@extends('layout')

@section('title', 'Create Password Item')

@section('content')
    <div class="row mt-3 ms-1 me-1 mb-3">
        <div class="col-12">
            <form action="{{ url('/pwitems') }}" method="POST">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Password Item</h2>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('post')
                        <div class="mb-3 mt-3">
                            <label for="site" class="form-label">
                                <strong>Site:</strong>
                            </label>
                            <input type="text" class="form-control" id="site" placeholder="" name="site"
                                value="{{ old('site') }}">
                        </div>
                        <div class="mb-3">
                            <label for="site" class="form-label">
                                <strong>Username:</strong>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="username" placeholder=""
                                name="username" value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                            <label for="site" class="form-label">
                                <strong>Password:</strong>
                            </label>
                            <input type="text" class="form-control form-control-lg" id="password" placeholder=""
                                name="password" value="{{ $genPass ?? '' }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="note" class="form-label">
                                <strong>Note:</strong>
                            </label>
                            <textarea class="form-control" rows="5" id="note" name="note">{{ old('note') }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
