@extends('layouts.master')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0"></h5>
                <a href="{{ route('transaksi.index') }}"><span
                        class="float-end btn btn-primary fs-22 text-white">Kembali</span></a>
            </div>
            <div class="card-body">

                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">ID Produk</label>
                        <select name="produks_id[]" class="form-control" multiple>
                            @foreach ($produk as $pd)
                                <option value="{{ $pd['id'] }}">
                                    {{ $pd['id'] }} ({{ $pd['nama_produk'] }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jumlah Produk</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="jumlah_produk" required>
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_transaksi" required>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
