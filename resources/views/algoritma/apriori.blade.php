@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body d-flex gap-3">
            <div class="alert alert-primary flex-grow-1 text-center" role="alert">
                <p class="fw-bold fs-4">minSupportCount</p>
                <p class="fw-bold fs-5">{{ $stepByStep['minSupportCount'] }}</p>
            </div>
            <div class="alert alert-primary flex-grow-1 text-center" role="alert">
                <p class="fw-bold fs-4">minConfidence</p>
                <p class="fw-bold fs-5">{{ $stepByStep['minConfidence'] * 100 . '%' }}</p>
            </div>
            <div class="alert alert-primary flex-grow-1 text-center" role="alert">
                <p class="fw-bold fs-4">transactionCount</p>
                <p class="fw-bold fs-5">{{ $stepByStep['transactionCount'] }}</p>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">Transaction</h5>

        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Produk ID</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($stepByStep['transactions'] as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ implode(',', $transaction) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header bg-primary text-white">Produk</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($produk as $prod)
                            <tr>
                                <td>{{ $prod->id }}</td>
                                <td>{{ $prod->nama_produk }}</td>
                                <td>{{ $prod->harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">Iteration</h5>
        <div class="card-body">
            @foreach ($stepByStep['iteration'] as $iterate)
                <div class="row">
                    <div class="col border-end border-primary">
                        <h5>Iteration {{ $loop->iteration }}: Frequent Items</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produk ID</th>
                                        <th>Support Count</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($iterate['frequentItems'] as $key => $frequentItems)
                                        <tr>
                                            <td>{{ str_replace('-', ',', (string) $key) }}</td>
                                            <td>{{ $frequentItems }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <h5>Iteration {{ $loop->iteration }}: filtered FrequentItems</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produk ID</th>
                                        <th>Support Count</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($iterate['filteredFrequentItems'] as $key => $filteredFrequentItems)
                                        <tr>
                                            <td>{{ str_replace('-', ',', (string) $key) }}</td>
                                            <td>{{ $filteredFrequentItems }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">Rules</h5>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>if</th>
                            <th>then</th>
                            <th>confidence</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stepByStep['rules'] as $rules)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ implode(',', $rules['if']) }}</td>
                                <td>{{ implode(',', $rules['then']) }}</td>
                                <td>{{ $rules['confidence'] * 100 . '%' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">Filtered Rules</h5>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>if</th>
                            <th>then</th>
                            <th>confidence</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stepByStep['filteredRules'] as $filteredRules)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ implode(',', $filteredRules['if']) }}</td>
                                <td>{{ implode(',', $filteredRules['then']) }}</td>
                                <td>{{ $filteredRules['confidence'] * 100 . '%' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
