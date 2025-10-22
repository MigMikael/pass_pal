@extends('layout')

@section('title', 'PassPal')

@section('specific-script')
    <script>
        function generate() {
            const len = parseInt(document.getElementById("len").value);
            const upper = document.getElementById("upper").checked;
            const nums = document.getElementById("nums").checked;
            const special = document.getElementById("special").checked;

            const pass = Util.generatePassword(len, upper, nums, special);
            document.getElementById("genPass").value = pass;
        }

        function reset() {
            document.getElementById("len").value = 15;
            document.getElementById("upper").checked = true;
            document.getElementById("nums").checked = true;
            document.getElementById("special").checked = true;
            document.getElementById("genPass").value = "";
        }

        function copyToClipboard() {
            var copyText = document.getElementById("genPass");
            copyText.select();
            copyText.setSelectionRange(0, 50);
            navigator.clipboard.writeText(copyText.value);
        }

        document.addEventListener('DOMContentLoaded', function() {
            generate();
        }, false);
    </script>
@endsection

@section('content')
    <div class="row mt-3 ms-1 me-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Strong Password Generator</h2>
                </div>
                <div class="card-body">
                    <div class="input-group input-group-lg mt-3">
                        <span class="input-group-text">Length</span>
                        <input type="number" class="form-control" id="len" value="15" min="8" max="50">
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
                    <button class="btn btn-primary" onclick="generate();">Generate Password</button>
                    <button class="btn btn-default" onclick="reset();">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </button>
                </div>
                <div class="card-footer">
                    <form action="{{ url('/pwitems/create') }}" method="POST">
                        <div class="row row-gap-3">
                            @csrf
                            @method('post')
                            @auth
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg fw-bold" id="genPass"
                                            name="genPass">
                                        <button class="btn btn-outline-secondary" onclick="copyToClipboard();" type="button">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-3 d-grid">
                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">
                                        <i class="bi bi-plus"></i>Add
                                    </button>
                                </div>
                            @endauth
                            @guest
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg fw-bold" id="genPass"
                                            name="genPass">
                                        <button class="btn btn-outline-secondary" onclick="copyToClipboard();" type="button">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
