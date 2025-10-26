@extends('layout')

@section('title', 'Password Item')

@section('specific-script')
    <script>
        function viewPassword(targetElementId) {
            var passInput = document.getElementById(targetElementId);
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

        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                setTimeout(() => {
                    window.location.replace("/sites")
                }, 300000);
            }
        }, false);
    </script>
@endsection

@section('content')
    <div class="row mt-3 mb-3">
        <h2>Site: {{ $site->name }}</h2>
    </div>
    @include('_alert')
    <div class="row g-2 mt-3 mb-3">
        @foreach ($pwItems as $pwItem)
            @include('site._card', ['pwItem' => $pwItem])
        @endforeach
    </div>
@endsection
