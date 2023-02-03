<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Shuchkin\SimpleXLSX;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('start_date') and $request->has('end_date')) {
            $transaksi = Transaksi::with('transaksiItems')->whereBetween('tgl_transaksi', [$request->start_date, $request->end_date])->get();
        } else {
            $transaksi = Transaksi::with('transaksiItems')->latest()->get();
        }
        $transaksi = $transaksi->groupBy('tgl_transaksi');
        // dd($transaksi->count(), $transaksi);
        $produks = Produk::all();
        return view('transaksi.index', ['transaksi' => $transaksi, 'produks' => $produks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('transaksi.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $transaksi = Transaksi::create([
            'tgl_transaksi' => $request->tgl_transaksi
        ]);
        foreach ($request->produks_id as $pid) {
            TransaksiItem::create([
                'jumlah_produk' => 1,
                'produks_id' => $pid,
                'transaksis_id' => $transaksi->id
            ]);
        }

        return redirect('transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $produks = Produk::all();
        return view('transaksi.edit', compact('transaksi', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update([
            'produks_id' => $request->produks_id,
            'jumlah_produk' => $request->jumlah_produk,
            'tgl_transaksi' => $request->tgl_transaksi,
        ]);

        return redirect('transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('transaksi');
    }

    public function viewImport()
    {
        return view('transaksi.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'file|required'
        ]);

        $filename = str(time()) . ".xlsx";
        $path = $request->file('file_excel')->storeAs('public/files/excel', $filename);
        $xlsx = SimpleXLSX::parse('storage/files/excel/' . $filename);

        $temp = $xlsx->rowsEx();

        foreach ($temp as $idx => $item) {
            if ($idx == 0) {
                continue;
            }
            $trx = Transaksi::create([
                "tgl_transaksi" => $item[0]['value'],
            ]);

            $produkIds = explode('-', $item[1]['value']);
            $produkJumlah = explode('-', $item[2]['value']);

            foreach ($produkIds as $idx => $val) {
                TransaksiItem::create([
                    'transaksis_id' => $trx->id,
                    'produks_id' => $val,
                    'jumlah_produk' => $produkJumlah[$idx],
                ]);
            }
        }

        Storage::delete($path);

        return redirect()->route('transaksi.index')->with('success', 'Success import excel');
    }
}
