@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('produk.index') }}"><span class="float-end btn btn-primary fs-22 text-white">Kembali</span></a>
        </div>
        <div class="card-body">
            <img src="{{ Storage::url($produk->gambar) }}" alt="" height="100">
            <p class="fs-1">{{ $produk->nama_produk }}</p>
            <p>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>
        </div>
    </div>
@endsection
