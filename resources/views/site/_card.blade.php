<div class="col-sm-6">
    <div class="card">
        <div class="card-body">
            <label class="form-label" for="username">
                <strong>Username:</strong>
            </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" value="{{ $pwItem->username }}" readonly
                    id="username_{{ $pwItem->slug }}">
                <button class="btn btn-primary" onclick="copyToClipboard('username_{{ $pwItem->slug }}');">
                    <i class="bi bi-copy"></i>
                </button>
            </div>
            <label class="form-label" for="password">
                <strong>Password:</strong>
            </label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" value="{{ $pwItem->password }}"
                    readonly id="password_{{ $pwItem->slug }}">
                <button class="btn btn-outline-secondary" onclick="viewPassword('password_{{ $pwItem->slug }}');">
                    <i class="bi bi-eye-slash"></i>
                </button>
                <button class="btn btn-primary" onclick="copyToClipboard('password_{{ $pwItem->slug }}');">
                    <i class="bi bi-copy"></i>
                </button>
            </div>
            <p><strong>Note:</strong> {{ $pwItem->note }}</p>
            <p><strong>Update At:</strong> {{ $pwItem->updated_at->format('D d/m/Y H:i:s') }}</p>
        </div>
        <div class="card-footer text-end">
            <form action="{{ url('pwitems/' . $pwItem->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('pwitems/' . $pwItem->slug . '/edit') }}" class="btn btn-outline-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                </a>
                <a href='#' onclick='confirm("Confirm delete?") == true && this.parentNode.submit(); return false;'
                    class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i>
                    Delete
                </a>
            </form>
        </div>
    </div>
</div>
