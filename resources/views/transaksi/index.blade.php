@extends('layouts.master')

@section('content')
    @if (auth()->user()->role === 'admin')
        <div class="col mb-4">
            <a href="tambah_transaksi.php" class="btn btn-warning">Tambah</a>
        </div>
    @else
    @endif

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header bg-primary text-white">Data Transaksi</h5>
        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    {{-- @foreach ($transaksi as $td)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->id_produk }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $td->jumlah_produk }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                {{ date('d M Y', strtotime($td->tgl_transaksi)) }}
                            </td>

                            <td style="display: block;">
                                <a class="btn btn-primary m-2"
                                    href="edit_transaksi.php?id_transaksi={{ $td->id_transaksi }}">
                                    <i class="bx bx-edit-alt me-1 text-white"></i>
                                </a>
                                <a class="btn btn-danger" href="hapus_transaksi.php?id_transaksi={{ $td->id_transaksi }}"
                                    onclick="return confirm('Yakin ingin menghapus transaksi ini ?')">
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
