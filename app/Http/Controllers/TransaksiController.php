<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Barang;
use DB;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);

        return view('transaksis.index', compact('transaksis'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $barang = Barang::all();
        return view('transaksis.create', compact('barang'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_bar' => 'required',
        //     'harga_bar' => 'required',
        //     'total_bar' => 'required',
        //     'total_bay' => 'required',
        //     'tanggal_bel' => 'required',
        // ]);

        $find_barang = barang::where('nama_bar', $request->nama_bar)->first();
        $total_har = $request->total_barang * $find_barang->harga_bar;
        if ($request->total_bar <= $find_barang->stok) {
            if ($request->total_bay < $total_har) {
                return redirect()
                    ->back()
                    ->with('error', 'Uang tidak cukup!');
            } else {
                Transaksi::create([
                    'nama_bar' => $request->nama_bar,
                    'harga_bar' => $find_barang->harga_bar,
                    'total_bar' => $request->total_bar,
                    'total_har' => $request->total_bar * $find_barang->harga_bar,
                    'total_bay' => $request->total_bay,
                    'kembalian' => $request->total_bay - $request->total_bar * $find_barang->harga_bar,
                    'tanggal_bel' => Carbon::now(),
                ]);
                DB::table('barangs')
                    ->where('nama_bar', $find_barang->nama_bar)
                    ->update(['stok' => $find_barang->stok - $request->total_bar]);
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'stok tidak memadai!');
        }

        // transaksi::create($request->all());

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Daftar Belanja Berhasil Ditulis.');
    }

    public function show(transaksis $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }

    public function edit(transaksi $transaksi)
    {
        $barang = Barang::all();
        return view('transaksis.edit', compact('barang'));
    }


    public function update(Request $request, transaksi $transaksi)
    {
        // $request->validate([
        //     'nama_bar' => 'required',
        //     'harga_bar' => 'required',
        //     'total_bar' => 'required',
        //     'total_bay' => 'required',
        //     'tanggal_bel' => 'required',
        // ]);

        $find_barang = barang::where('nama_bar', $request->nama_bar)->first();
        $total_har = $request->total_barang * $find_barang->harga_bar;
        if ($request->total_bar <= $find_barang->stok) { 
            if ($request->total_bay < $total_har) {
                return redirect()
                    ->back()
                    ->with('error', 'Uang tidak cukup!');
            } else {
                Transaksi::create([
                    'nama_bar' => $request->nama_bar,
                    'harga_bar' => $find_barang->harga_bar,
                    'total_bar' => $request->total_bar,
                    'total_har' => $request->total_bar * $find_barang->harga_bar,
                    'total_bay' => $request->total_bay,
                    'kembalian' => $request->total_bay - $request->total_bar * $find_barang->harga_bar,
                    'tanggal_bel' => Carbon::now(),
                ]);
                DB::table('barangs')
                    ->where('nama_bar', $find_barang->nama_bar)
                    ->update(['stok' => $find_barang->stok - $request->total_bar]);
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'stok tidak memadai!');
        }


        $pengguna->update($request->all());
      
        return redirect()->route('penggunas.index')
                        ->with('success','pengguna updated successfully');
    }

    public function destroy(transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'transaksi deleted successfully');
    }

    public function getHarga(Request $request)
    {
        $hargas['nama_bar'] = Barang::where('nama_bar', $request->nama_bar)->first();

        return response()->json([
            'hargas' => $hargas,
        ]);
    }
}
