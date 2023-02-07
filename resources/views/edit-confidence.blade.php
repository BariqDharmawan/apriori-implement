@extends('layouts.master')

@section('content')
    <a href="{{ route('akun.index') }}" class="mb-3">
        <span class="btn btn-outline-primary fs-22 mb-3">
            Kembali </span>
    </a>

    <form action="{{ route('edit-confidence.update') }}" method="POST">
        @csrf @method('PUT')
        <input type="number" class="form-control" name="min_confidence" value="{{ $staticVar->min_confidence }}"
            placeholder="min confidence" max="1" min="0.0" required>
        <button type="submit" class="btn btn-primary mt-3">Change</button>
    </form>
@endsection
