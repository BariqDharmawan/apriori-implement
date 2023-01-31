@extends('layouts.master')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0"></h5>
                <p><i class="text-muted">Edit Data User</i></p>
                <a href="{{ route('akun.index') }}"><span
                        class="float-end btn btn-primary fs-22 text-white">Kembali</span></a>
            </div>
            <div class="card-body">

                <form action="{{ route('akun.update', $user->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="{{ $user['username'] }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="{{ $user['password'] }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{ $user['nama'] }}" required>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
