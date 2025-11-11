@extends('layout')

@section('title', 'PassPal')

@section('specific-script')
    <script>
        function generatePassword(len, upper, nums, special) {
            var length = (len) ? (len) : (10);
            var string = "abcdefghijklmnopqrstuvwxyz"; //to upper 
            var numeric = '0123456789';
            var punctuation = '!@#$%^&*()_+~`|}{[]\:;?><,./-=';
            var password = "";
            var character = "";
            var crunch = true;

            if (!upper && !nums && !special) {
                return ""
            }

            while (password.length < length) {
                const entity1 = Math.ceil(string.length * Math.random() * Math.random());
                const entity2 = Math.ceil(numeric.length * Math.random() * Math.random());
                const entity3 = Math.ceil(punctuation.length * Math.random() * Math.random());
                let hold = string.charAt(entity1);
                hold = (password.length % 2 == 0) ? (hold.toUpperCase()) : (hold);

                if (upper) {
                    character += hold;
                }
                if (nums) {
                    character += numeric.charAt(entity2);
                }
                if (special) {
                    character += punctuation.charAt(entity3);
                }
                password = character;
            }
            password = password.split('').sort(function() {
                return 0.5 - Math.random()
            }).join('');
            return password.substring(0, len);
        }

        function generate() {
            const len = parseInt(document.getElementById("len").value);
            const upper = document.getElementById("upper").checked;
            const nums = document.getElementById("nums").checked;
            const special = document.getElementById("special").checked;

            const pass = generatePassword(len, upper, nums, special);
            document.getElementById("genPass").value = pass;
        }

        function reset() {
            document.getElementById("len").value = 12;
            document.getElementById("upper").checked = true;
            document.getElementById("nums").checked = true;
            document.getElementById("special").checked = true;
            document.getElementById("genPass").value = "";
            // generate();
        }

        function copyToClipboard() {
            const copyText = document.getElementById("genPass");
            copyText.select();
            copyText.setSelectionRange(0, 50);
            navigator.clipboard.writeText(copyText.value);
        }

        function increase() {
            const len = parseInt(document.getElementById("len").value);
            if (len < 50) {
                document.getElementById("len").value = len + 1;
            }
        }

        function decrease() {
            const len = parseInt(document.getElementById("len").value);
            if (len > 8) {
                document.getElementById("len").value = len - 1;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            generate();
        }, false);
    </script>
    {{-- @RegisterServiceWorkerScript --}}
    <script src="{{ url('/pass-pal/sw.js') }}"></script>
    <script>
        "use strict";
        if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register("/pass-pal/sw.js", {
                scope: "/pass-pal"
            }).then(
                (registration) => {
                    console.log("Service worker registration succeeded:");
                },
                (error) => {
                    console.log("Service worker registration failed", error);
                }
            );
        } else {
            console.log("Service workers are not supported.");
        }
        let deferredPrompt;

        function showInstallPromotion() {
            document.getElementById("install-prompt").style.display = "block"
        }
        window.addEventListener("load", (() => {
            if (window.matchMedia("(display-mode: standalone)").matches) {
                document.getElementById("install-prompt").style.display = "none"
            }
        })), window.addEventListener("beforeinstallprompt", (e => {
            e.preventDefault(), deferredPrompt = e, showInstallPromotion();
            document.getElementById("install-button").addEventListener("click", (() => {
                deferredPrompt.prompt(), deferredPrompt.userChoice.then((e => {
                    deferredPrompt = null
                }))
            }))
        })), window.addEventListener("appinstalled", (() => {
            document.getElementById("install-prompt").style.display = "none"
        }));
    </script>
@endsection

@section('content')
    <div class="row g-2 mt-3 mb-3">
        <div class="col-12">
            <div class="card shadow-sm rounded-4">
                <div class="card-header">
                    <h3 class="mt-3 mb-3">Strong Password Generator</h3>
                </div>
                <div class="card-body">
                    <div class="input-group mt-3">
                        <span class="input-group-text">Length</span>
                        <input type="number" class="form-control" id="len" value="12" min="8"
                            max="50">
                        <button class="btn btn-danger" onclick="decrease();">
                            <i class="bi bi-dash-lg"></i>
                        </button>
                        <button class="btn btn-success" onclick="increase();">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="upper" checked>
                        <label class="form-check-label">Include Uppercase</label>
                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="nums" checked>
                        <label class="form-check-label">Include Numbers</label>
                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="special" checked>
                        <label class="form-check-label">Include Special Characters</label>
                    </div>
                    <hr>
                    <div class="clearfix">
                        <div class="float-start">
                            <button class="btn btn-default" onclick="reset();">
                                <i class="bi bi-arrow-clockwise"></i>
                                Reset
                            </button>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-primary" onclick="generate();">
                                Generate Password
                                {{-- <i class="bi bi-arrow-repeat"></i> --}}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ url('/pass-pal/pwitems/create') }}" method="POST">
                        <div class="row row-gap-3 mt-3 mb-3">
                            @csrf
                            @method('post')

                            <div class="col-sm-12">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control fw-bold" id="genPass" name="genPass"
                                        readonly>
                                    <button class="btn btn-outline-secondary" onclick="copyToClipboard();" type="button">
                                        <i class="bi bi-copy"></i>
                                    </button>
                                    @auth
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </button>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
