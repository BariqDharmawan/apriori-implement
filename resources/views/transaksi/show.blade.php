@extends('layouts.master')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0"></h5>
                <a href="transaksi.php">
                    <span class="text-white float-end btn btn-primary fs-22">Kembali</span>
                </a>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 4; $i++)
                            <tr>
                                <th>1</th>
                                <th>{{ date('Y-m-d') }}</th>
                                @for ($j = 0; $j < 4; $j++)
                                    <th>Produk {{ $j }}</th>
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
