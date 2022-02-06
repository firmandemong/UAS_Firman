<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inven_toko = Toko::all();
        return view('toko.index', ['inventokos' => $inven_toko]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'nama_barang' => 'required',
            'jumlah'=>'required',
            'tanggal_masuk'=>'required',
            'harga_satuan'=>'required'
        ]);

        toko::create($request->all());
        return redirect('/toko')->with('success',  'Stock Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        $inven_toko = Toko::find($toko->id);
        return view('toko.edit', compact('inven_toko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            
            'nama_barang' => 'required',
            'jumlah'=>'required',
            'tanggal_masuk'=>'required',
            'harga_satuan'=>'required'
        ]);

        $toko->update($request->all());
        $harga = Toko::where('id',$request->barang_id)->first();
        // $request['jumlah'] = $request->jumlah - $->;
        return redirect('/toko')->with('success',  'Stock Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        $toko->delete();
        return redirect('/toko')->with('success', 'Stock Deleted');
    
    }
    
    public function dashboard(){
        return view ('toko.dashboard');
    }
}
