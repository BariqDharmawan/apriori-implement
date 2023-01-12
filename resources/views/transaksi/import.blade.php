@extends('layouts.master')

@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-primary">{{ $error }}</li>
                @endforeach
            </ul>
            <div class="card-body">
                <form action="{{ route('transaksi.import.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="formFileTransaksi" class="form-label">Import excel</label>
                    <input class="form-control" type="file" name="file_excel" id="formFileTransaksi">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
