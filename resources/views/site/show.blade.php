@extends('layout')

@section('title', 'Password Item')

@section('specific-script')
    <script>
        function viewPassword(targetElementId) {
            var passInput = document.getElementById(targetElementId);
            var childIcon = document.getElementById("icon_" + targetElementId);
            if (passInput.type === "password") {
                passInput.type = "text";
                childIcon.className = "bi bi-eye-fill"
            } else {
                passInput.type = "password";
                childIcon.className = "bi bi-eye-slash-fill"
            }
        }

        function copyToClipboard(targetElementId) {
            var copyText = document.getElementById(targetElementId);
            copyText.select();
            copyText.setSelectionRange(0, 50);
            navigator.clipboard.writeText(copyText.value);
        }

        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                setTimeout(() => {
                    window.location.replace("/pass-pal/sites")
                }, 300000);
            }
        }, false);
    </script>
@endsection

@section('content')
    <div class="row g-2 mt-3 mb-3">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2>Site: {{ $site->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    @include('_alert')
    <div class="row g-2 mt-3 mb-3">
        @foreach ($pwItems as $pwItem)
            @include('site._card', [
                'pwItem' => $pwItem,
                'iteration' => $loop->iteration,
            ])
        @endforeach
    </div>
@endsection
