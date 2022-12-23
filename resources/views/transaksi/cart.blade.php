@extends('layouts.master')

@section('content')
    <div class="card">
        <h5 class="card-header bg-primary text-white">Data Cart</h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Produk Name</th>
                    <th>QTY</th>
                    <th>Tanggal Ditambahkan</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $cart->produk->gambar }}" alt="" srcset=""
                                style="width: 100px; height: 100px">
                        </td>
                        <td>{{ $cart->produk->nama_produk }}</td>
                        <td>{{ $cart->qty }}</td>
                        <td>{{ $cart->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
