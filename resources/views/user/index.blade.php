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
                    {{-- @foreach ($admins as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->username }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->nama }}</td>
                            <td style="display: block;">
                                <a class="btn btn-primary m-2" href="edit_admin.php?id_admin={{ $td->id_admin }}">
                                    <i class="bx bx-edit-alt me-1 text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach --}}
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
                    {{-- @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->username }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->nama }}</td>
                            <td style="display: block;">
                                <a class="btn btn-primary m-2" href="edit_user.php?id_user={{ $td->id_user }}">
                                    <i class="bx bx-edit-alt me-1 text-white"></i>
                                </a>
                                <a class="btn btn-danger" href="hapus_user.php?id_user={{ $td->id_user }}"
                                    onclick="return confirm('Yakin ingin menghapus {{ $td->nama }} ?')">
                                    <i class="bx bx-trash me-1 text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    <hr class="m-5" />
@endsection
