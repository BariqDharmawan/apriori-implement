@extends('layouts.master')

@section('content')
    @if (auth()->user()->role === 'admin')
        <div class="row gx-0">
            <div class="col-md-6 mb-4">
                <a href="{{ route('transaksi.create') }}" class="btn btn-warning">Tambah</a>
            </div>
            <div class="col-md-6">
                <form action="{{ route('transaksi.index') }}" method="GET" class="row justify-content-end align-items-end">
                    <div class="col-md-4">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="start_date">
                    </div>
                    <div class="col-md-4">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="end_date">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <a href="{{ route('algoritma.apriori') }}" class="btn btn-info">Lihat Apriori</a>
        <a href="{{ route('transaksi.import.index') }}" class="btn btn-info">Import Transaksi</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header bg-primary text-white">Data Transaksi</h5>
        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        @foreach ($produks as $produk)
                            <th>Produk {{ $produk->id }}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($transaksi as $key => $td)
                        <tr class="bg-warning">
                            <td colspan="{{count($produks)+3}}"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                {{ date('d M Y', strtotime($key)) }}
                            </td>
                        </tr>
                        
                        @foreach ($td as $trx)
                        {{-- @dump($trx) --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    traksaksi #{{ $trx->id }}
                                </td>
    
                                @foreach ($produks as $produk)
                                    <td>{{ $trx->transaksiItems->where('produks_id', $produk->id)->count() > 0 ? 'Yes' : 'No' }}
                                    </td>
                                @endforeach
                                <td style="display: block;">
                                    <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus transaksi ini ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bx bx-trash me-1 text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    <hr class="m-5" />
@endsection
