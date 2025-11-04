<div class="col-sm-6">
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <label class="form-label" for="username_{{ $iteration }}">
                <strong>Username:</strong>
            </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" value="{{ $pwItem->username }}" readonly
                    id="username_{{ $iteration }}">
                <button class="btn btn-primary" onclick="copyToClipboard('username_{{ $iteration }}');">
                    <i class="bi bi-copy"></i>
                </button>
            </div>
            <label class="form-label" for="password_{{ $iteration }}">
                <strong>Password:</strong>
            </label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" value="{{ $pwItem->password }}"
                    readonly id="password_{{ $iteration }}">
                <button class="btn btn-secondary" onclick="viewPassword('password_{{ $iteration }}');">
                    <i class="bi bi-eye-slash" id="icon_password_{{ $iteration }}"></i>
                </button>
                <button class="btn btn-primary" onclick="copyToClipboard('password_{{ $iteration }}');">
                    <i class="bi bi-copy"></i>
                </button>
            </div>
            <p><strong><u>Note:</u></strong> {{ $pwItem->note }}</p>
            <p><strong><u>Update At:</u></strong> {{ $pwItem->updated_at->format('D - d/m/Y - H:i') }}</p>
        </div>
        <div class="card-footer text-end">
            <form action="{{ url('/pass-pal/pwitems/' . $pwItem->slug) }}" method="POST" class="clearfix mt-1 mb-1">
                @csrf
                @method('DELETE')
                <a href='#' onclick='confirm("Confirm delete?") == true && this.parentNode.submit(); return false;'
                    class="btn btn-outline-danger btn-sm float-start">
                    <i class="bi bi-trash"></i>
                    Delete
                </a>
                <a href="{{ url('/pass-pal/pwitems/' . $pwItem->slug . '/edit') }}" class="btn btn-outline-warning btn-sm float-end">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                </a>
            </form>
        </div>
    </div>
</div>
