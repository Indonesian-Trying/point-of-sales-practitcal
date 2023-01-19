<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $dists = Distributor::latest()->paginate(5);

        return view('distributors.index', compact('dists'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('distributors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dis' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Distributor::create($request->all());

        return redirect()
            ->route('distributors.index')
            ->with('success', 'Distributor created successfully.');
    }
    public function show(Distributor $distributor)
    {
        return view('distributors.show', compact('distributor'));
    }

    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_dis' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $distributor->update($request->all());

        return redirect()
            ->route('distributors.index')
            ->with('success', 'distributor updated successfully');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();

        return redirect()
            ->route('distributors.index')
            ->with('success', 'distributor deleted successfully');
    }
}
