@extends('layout')

@section('title', 'PassPal Register')

@section('content')
    <div class="row g-2 mt-3 mb-3">
        <div class="col-12">
            <form action="{{ url('/register') }}" method="POST">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2>Register</h2>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('post')
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">
                                <strong>Name:</strong>
                            </label>
                            <input type="text" class="form-control" id="name" placeholder="" name="name"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3 mt-3">
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
                        <div class="mb-3 mt-3">
                            <label for="password_confirmation" class="form-label">
                                <strong>Confirm Password:</strong>
                            </label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder=""
                                name="password_confirmation" required>
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
