<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{

    public function index()
    {
        $mereks = Merek::latest()->paginate(5);
      
        return view('mereks.index',compact('mereks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  

    public function create()
    {
        return view('mereks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
      
        Merek::create($request->all());
       
        return redirect()->route('mereks.index')
                        ->with('success','merek created successfully.');
    }
  

    public function show(Merek $merek)
    {
        return view('mereks.show',compact('merek'));
    }
  

    public function edit(Merek $merek)
    {
        return view('mereks.edit',compact('merek'));
    }
  

    public function update(Request $request, Merek $merek)
    {
        $request->validate([
            'nama' => 'required',
        ]);
      
        $merek->update($request->all());
      
        return redirect()->route('mereks.index')
                        ->with('success','merek updated successfully');
    }

    public function destroy(Merek $merek)
    {
        $merek->delete();
       
        return redirect()->route('mereks.index')
                        ->with('success','merek deleted successfully');
    }
}