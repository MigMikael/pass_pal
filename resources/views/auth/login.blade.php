@extends('layout')

@section('title', 'PassPal Login')

@section('specific-script')
    <script>
        async function loginPasskey() {
            if (Webpass.isUnsupported()) {
                alert("Your browser doesn't support WebAuthn.")
            }

            const {
                success,
                error
            } = await Webpass.assert(
                "/pass-pal/webauthn/login/options",
                "/pass-pal/webauthn/login",
            )

            if (success) {
                window.location.replace("/pass-pal/sites")
            } else {
                console.log('error', error)
            }
        }
    </script>
@endsection
@section('content')
    <div class="row g-2 mt-3 mb-3">
        <div class="col-12">
            <form action="{{ url('/pass-pal/login') }}" method="POST">
                <div class="card shadow-sm rounded-4">
                    <div class="card-header">
                        <h2 class="mt-3 mb-3">Login</h2>
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
                    <div class="card-footer text-end pt-3 pb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-2 mt-3 mb-3">
        <hr>
        <button type="button" class="btn btn-dark rounded-4" data-bs-toggle="collapse" data-bs-target="#pk-collapse">
            Try another way
        </button>
        <div id="pk-collapse" class="collapse">
            <div class="card shadow-sm rounded-4">
                <div class="card-body mx-auto">
                    <button type="button" class="btn btn-secondary" onclick="loginPasskey();">
                        <i class="bi bi-key"></i>
                        Login with Passkey
                    </button>
                </div>
            </div>
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
