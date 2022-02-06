@extends('layouts.appp')

@section('content')
    <div class="col-md-8 offset-md-2">
        <h3> Edit Stok</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div> <br />
        @endif

        <form method="post" action="/toko/{{ $inven_toko->id }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name"> Nama Barang </label>
                <input type="text" class="form-control" name="nama_barang" value="{{ $inven_toko->nama_barang }}">
            <div class="form-group">
                <label for="name"> Jumlah </label>
                <input type="number" class="form-control" name="jumlah" value="{{ $inven_toko->jumlah }}">    
            <div class="form-group">
                <label for="name"> Tanggal Masuk </label>
                <input type="date" class="form-control" name="tanggal_masuk" value="{{ $inven_toko->tanggal_masuk }}">
            <div class="form-group">
                <label for="name"> Harga Satuan</label>
                <input type="number" class="form-control" name="harga_satuan" value="{{ $inven_toko->harga_satuan }}">        
                <h1></h1>
                <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection
