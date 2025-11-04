@extends('layout')

@section('title', 'User Profile')

@section('specific-script')
    <script>
        function editUserInfo() {
            nameElement = document.getElementById("name")
            emailElement = document.getElementById("email")
            passElement = document.getElementById("password")
            confElement = document.getElementById("password_confirmation")

            nameElement.disabled = !nameElement.disabled
            emailElement.disabled = !emailElement.disabled
            passElement.disabled = !passElement.disabled
            confElement.disabled = !confElement.disabled
        }

        async function registerPasskey() {
            if (Webpass.isUnsupported()) {
                alert("Your browser doesn't support WebAuthn.")
            }
            const {
                success,
                error
            } = await Webpass.attest("/pass-pal/webauthn/register/options", "/pass-pal/webauthn/register")

            if (success) {
                window.location.replace("/pass-pal/profile")
                alert("Register passkey success!.")
            } else {
                console.log('error', error)
                alert("Register passkey fail!.")
            }
        }
    </script>
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
        <div class="col-12">
            <form action="{{ url('/pass-pal/profile') }}" method="POST">
                <div class="card shadow-sm rounded-4">
                    <div class="card-header">
                        <h2 class="mt-3 mb-3">User Profile</h2>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('post')
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">
                                <strong>Name:</strong>
                            </label>
                            <input type="text" class="form-control" id="name" placeholder="" name="name" disabled
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">
                                <strong>Email:</strong>
                            </label>
                            <input type="email" class="form-control" id="email" placeholder="" name="email" disabled
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <strong>Password:</strong>
                            </label>
                            <input type="password" class="form-control" id="password" placeholder="" name="password"
                                disabled>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password_confirmation" class="form-label">
                                <strong>Confirm Password:</strong>
                            </label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder=""
                                name="password_confirmation" disabled>
                        </div>
                    </div>
                    <div class="card-footer text-end pb-3 pt-3">
                        <button type="button" class="btn btn-outline-secondary" onclick="editUserInfo();">Edit User
                            Info</button>
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
    <div class="row g-2 mt-3 mb-3">
        <div class="col-12">
            <div class="card shadow-sm rounded-4">
                <div class="card-body">
                    @if ($user->registered_passkey)
                        <button type="button" class="btn btn-outline-primary mt-3 mb-3" onclick="registerPasskey();">
                            <i class="bi bi-key"></i>
                            Re-register Passkey
                        </button>
                    @else
                        <button type="button" class="btn btn-primary mt-3 mb-3" onclick="registerPasskey();">
                            <i class="bi bi-key"></i>
                            Register Passkey
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
