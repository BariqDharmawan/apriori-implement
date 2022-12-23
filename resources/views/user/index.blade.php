@extends('layouts.master')

@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header bg-primary text-white">Data Admin</h5>
        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($admins as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $user->username }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $user->nama }}</td>
                            <td style="display: block;">
                                <a class="btn btn-primary m-2" href="{{ route('akun.edit', $user->id) }}">
                                    <i class="bx bx-edit-alt me-1 text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    <hr class="m-5" />

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header bg-primary text-white">Data User</h5>
        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $td)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->username }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->nama }}</td>
                            <td style="display: block;">
                                <a class="btn btn-primary m-2" href="{{ route('akun.edit', $td->id) }}">
                                    <i class="bx bx-edit-alt me-1 text-white"></i>
                                </a>
                                <form action="{{ route('akun.destroy', $td->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus {{ $td->nama }} ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bx bx-trash me-1 text-white"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    <hr class="m-5" />
@endsection
