@extends('layouts.master')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0"></h5>
                <a href="transaksi.php"><span class="text-white float-end btn btn-primary fs-22">Kembali</span></a>
            </div>
            <div class="card-body">

                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">ID Produk</label>
                        <select name="produks_id" class="form-control">
                            @foreach ($produks as $pd)
                                <option value="{{ $pd['id'] }}" @if ($pd['id'] === $transaksi->produks_id) selected @endif>
                                    {{ $pd['id'] }} ({{ $pd['nama_produk'] }})
                                </option>
                            @endforeach

                            <option value="{{ $transaksi['produks_id'] }}">{{ $transaksi['produks_id'] }}</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jumlah Produk</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="jumlah_produk"
                                value="{{ $transaksi['jumlah_produk'] }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_transaksi"
                                value="{{ date('Y-m-d', strtotime($transaksi['tgl_transaksi'])) }}" required>
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
