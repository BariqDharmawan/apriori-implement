@extends('layouts.master')

@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header bg-primary text-white">Hasil Apriori</h5>

        <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>If</th>
                        <th>Then</th>
                        <th>Confidence</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($apriories as $apriory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <ol class="m-0">
                                    @foreach ($apriory['if'] as $itemIf)
                                        <li>
                                            {{ $itemIf->nama_produk }} {{ !$loop->last ? ',' : '' }}
                                        </li>
                                    @endforeach
                                </ol>
                            </td>
                            <td>
                                <ol class="m-0">
                                    @foreach ($apriory['then'] as $itemThen)
                                        <li>
                                            {{ $itemThen->nama_produk }}
                                            {{ !$loop->last ? ',' : '' }}
                                        </li>
                                    @endforeach
                                </ol>
                            </td>
                            <td>{{ $apriory['confidence'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
