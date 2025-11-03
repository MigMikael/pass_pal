@extends('layout')

@section('title', 'PassPal Login')

@section('content')
    <div class="row g-2 mt-3 mb-3">
        <div class="col-12">
            <form action="{{ url('/pass-pal/login') }}" method="POST">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <strong>Email:</strong>
                            </label>
                            <input type="email" class="form-control" id="email" placeholder="" name="email"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <strong>Password:</strong>
                            </label>
                            <input type="password" class="form-control" id="password" placeholder="" name="password"
                                required>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-secondary" onclick="Util.loginPasskey();">Login with Passkey</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-2 mt-3 mb-3">

    </div>

    @if ($errors->any())
        <div class="row g-2 mt-3 mb-3">
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
