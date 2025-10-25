@extends('layout')

@section('title', 'Password Item')

@section('specific-script')
    <script>
        function viewPassword() {
            var passInput = document.getElementById("password");
            if (passInput.type === "password") {
                passInput.type = "text";
            } else {
                passInput.type = "password";
            }
        }

        function copyToClipboard(targetElementId) {
            var copyText = document.getElementById(targetElementId);
            copyText.select();
            copyText.setSelectionRange(0, 50);
            navigator.clipboard.writeText(copyText.value);
        }
    </script>
@endsection

@section('content')
    <div class="row mt-3 ms-1 me-1 mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $pwItem->site }}</h2>
                </div>
                <div class="card-body">
                    <label class="form-label" for="username">
                        <strong>Username:</strong>
                    </label>
                    <div class="input-group mb-3 input-group-lg">
                        <input type="text" class="form-control" placeholder="Username" value="{{ $pwItem->username }}"
                            readonly id="username">
                        <button class="btn btn-primary" onclick="copyToClipboard('username');">
                            <i class="bi bi-copy"></i>
                        </button>
                    </div>
                    <label class="form-label" for="password">
                        <strong>Password:</strong>
                    </label>
                    <div class="input-group mb-5 input-group-lg">
                        <input type="password" class="form-control" placeholder="Password" value="{{ $pwItem->password }}"
                            readonly id="password">
                        <button class="btn btn-outline-secondary" onclick="viewPassword();">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-primary" onclick="copyToClipboard('password');">
                            <i class="bi bi-copy"></i>
                        </button>
                    </div>
                    <p><strong>Note:</strong> {{ $pwItem->note }}</p>
                    <p><strong>Create At:</strong> {{ $pwItem->created_at->format('D d/m/Y H:i:s') }}</p>
                    <p><strong>Update At:</strong> {{ $pwItem->updated_at->format('D d/m/Y H:i:s') }}</p>
                </div>
                <div class="card-footer text-end">
                    <form action="{{ url('pwitems/' . $pwItem->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('pwitems/' . $pwItem->slug . '/edit') }}" class="btn btn-outline-warning">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                        <a href='#' onclick='this.parentNode.submit(); return false;' class="btn btn-outline-danger">
                            <i class="bi bi-trash"></i>
                            Delete
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
