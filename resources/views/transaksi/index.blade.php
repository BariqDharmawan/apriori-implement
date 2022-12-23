@extends('layouts.master')

@section('content')
    @if (auth()->user()->role === 'admin')
        <div class="col mb-4">
            <a href="{{ route('transaksi.create') }}" class="btn btn-warning">Tambah</a>
        </div>

        <a href="{{ route('algoritma.apriori') }}" class="btn btn-info">Lihat Apriori</a>
    @endif

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header bg-primary text-white">Data Transaksi</h5>
        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        @foreach ($produks as $produk)
                            <th>Produk {{ $produk->id }}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($transaksi as $td)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                {{ date('d M Y', strtotime($td->tgl_transaksi)) }}
                            </td>

                            @foreach ($produks as $produk)
                                <td>Yes</td>
                            @endforeach
                            <td style="display: block;">
                                <form action="{{ route('transaksi.destroy', $td->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus transaksi ini ?')">
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
