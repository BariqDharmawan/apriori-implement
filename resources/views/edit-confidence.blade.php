@extends('layouts.master')

@section('content')
    <a href="{{ route('akun.index') }}" class="mb-3">
        <span class="btn btn-outline-primary fs-22 mb-3">
            Kembali </span>
    </a>

    <form action="{{ route('edit-var.update') }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="min_confidence">Min Confidence</label>
            <input type="number" id="min_confidence" class="form-control" name="min_confidence"
                value="{{ $staticVar->min_confidence }}" placeholder="min confidence" max="1" min="0.0"
                step="0.01" required>
        </div>

        <div>
            <label for="min_support">Min Support</label>
            <input type="number" class="form-control" id="min_support" name="min_support"
                value="{{ $staticVar->min_support }}" placeholder="min confidence" max="1" min="0.0"
                step="0.01" required>
            <button type="submit" class="btn btn-primary mt-3">Change</button>
        </div>
    </form>
@endsection
