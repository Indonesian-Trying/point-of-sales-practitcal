<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Merek;
use App\Models\Distributor;
use App\Models\Pengguna;
use Carbon\Carbon;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->paginate(5);
      
        return view('barangs.index',compact('barangs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $merek = Merek::all();
        $distributor = Distributor::all();
        $pengguna = Pengguna::all();
        return view('barangs.create', compact('merek','distributor','pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_bar' => 'required',
            'merek' => 'required',
            'nama_dis' => 'required',
            'harga_bar' => 'required',
            'harga_bel' => 'required',
            'stok' => 'required',
            'nama_pet' => 'required',
        ]);
      
        Barang::create([
            'id' => $request->id,
            'nama_bar' => $request->nama_bar,
            'merek' => $request->merek,
            'nama_dis' => $request->nama_dis,
            'harga_bar' => $request->harga_bar,
            'harga_bel' => $request->harga_bel,
            'stok' => $request->stok,
            'nama_pet' => $request->nama_pet,
            'waktu' => Carbon::now(),
        ]);
       
        return redirect()->route('barangs.index')
                        ->with('success','Distributor created successfully.');
    }

    public function show(Barangs $barang)
    {
        return view('barangs.show',compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $merek = Merek::all();
        $distributor = Distributor::all();
        $pengguna = Pengguna::all();
        return view('barangs.edit',compact('barang','merek','distributor'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'id' => 'required',
            'nama_bar' => 'required',
            'merek' => 'required',
            'nama_dis' => 'required',
            'harga_bar' => 'required',
            'harga_bel' => 'required',
            'stok' => 'required',
            'nama_pet' => 'required',
        ]);
      
        $barang->update([
        'id' => $request->id,
        'nama_bar' => $request->nama_bar,
        'merek' => $request->merek,
        'nama_dis' => $request->nama_dis,
        'harga_bar' => $request->harga_bar,
        'harga_bel' => $request->harga_bel,
        'stok' => $request->stok,
        'nama_pet' => $request->nama_pet,
        'waktu' => Carbon::now(),
        ]);
      
        return redirect()->route('barangs.index')
                            ->with('success','Barang updated successfully');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
       
        return redirect()->route('barangs.index')
                        ->with('success','barang deleted successfully');
    }
}
