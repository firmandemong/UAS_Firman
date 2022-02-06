<?php

namespace App\Http\Controllers;
use App\Models\Toko;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_barang = [];
        $transaksi = Transaksi::all();
        foreach ($transaksi as $item_transaksi){
            $barang = Toko::find($item_transaksi->barang_id);
            if($item_transaksi->barang_id == $barang->id){
                array_push($list_barang,$barang->nama_barang);
            }
        }
        return view('transaksi.index', [
            'transaksis' => $transaksi,
            'barangs' => $list_barang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang =Toko::all();
        return view('transaksi.create',compact('barang'));
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
            
            'barang_id' => 'required',
            'nama_pembeli' => 'required',
            'jumlah'=>'required',
        ]);
        $toko = Toko::find($request->barang_id);
        foreach($toko as $item){
            // $stock = $item->jumlah;
            // dd($sisa);
        }
        
        $sisa = $toko->jumlah - $request->jumlah;
        $toko->update([
            'jumlah'=>$sisa,
        ]);
        // $toko->update($request->all());
        $harga = Toko::where('id',$request->barang_id)->first();

        $harga = Toko::where('id',$request->barang_id)->first();
        $request['total_harga'] = $request->jumlah * $harga->harga_satuan;
        Transaksi::create($request->all());
        return redirect('/transaksi')->with('success',  'Stock Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $transaksi = Transaksi::find($transaksi->id);
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            
            'barang_id' => 'required',
            'nama_pembeli' => 'required',
            'jumlah'=>'required',
           
        ]);

        $transaksi->update($request->all());
        return redirect('/transaksi')->with('success',  'Stock Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('/transaksi')->with('success', 'Stock Deleted');
    
    }
    
    public function dashboard(){
        return view ('toko.dashboard');
    }
}
