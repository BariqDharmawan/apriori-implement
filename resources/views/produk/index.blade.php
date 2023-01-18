@extends('layouts.master')

@section('before-content')
    <form action="" method="POST">
        <div class="container-xxl container-p-y">
            <div class="row">
                <div class="col-4">
                    <input type="text" name="nama_produk" class="form-control border-2 mb-2"
                        placeholder="Cari Nama Produk..." />
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary" name="search">Cari</button>
                </div>
                @if (auth()->user()->role === 'admin')
                    <div class="col">
                        <a href="{{ route('produk.create') }}" class="btn btn-warning">Tambah</a>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection

@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header bg-primary text-white">Data Produk</h5>
        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ Storage::url($produk->gambar) }}" style="width: 100px; height : 100px"></td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                {{ $produk->nama_produk }}
                            </td>
                            <td class="text-end">
                                @if (auth()->user()->role === 'admin')
                                    <a class="btn btn-primary m-2" href="{{ route('produk.edit', $produk->id) }}">
                                        <i class="bx bx-edit-alt me-1 text-white"></i>
                                    </a>
                                    <form method="POST" action="{{ route('produk.destroy', $produk->id) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus' . $produk['nama_produk'] . '?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="bx bx-trash me-1 text-white"></i>
                                        </button>
                                    </form>
                                @else
                                    <p>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        Rp {{ number_format($produk->harga, 0) }}
                                    </p>
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="number" placeholder="QTY" min="1" name="qty" value="1"
                                            required>
                                        <button type="submit" name="produks_id" value="{{ $produk->id }}"
                                            class="btn btn-success">
                                            Add to cart
                                        </button>
                                    </form>
                                @endif
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
