@extends('layouts.appp')
@section('content')
    <div class="col-md-8 offset-md-2">
        <h1> Tambah Stok </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div> <br />
        @endif

        <form method="post" action="/toko">
            @csrf
            
            <div class="form-group">
                <label for="name"> Nama </label>
                <input type="text" class="form-control" name="nama_barang">
            </div>
            <div class="form-group">
                <label for="name"> Jumlah </label>
                <input type="number" class="form-control" name="jumlah">
            </div>
            <div class="form-group">
                <label for="name"> Tanggal Masuk </label>
                <input type="date" class="form-control" name="tanggal_masuk">
            </div>
            <div class="form-group">
                <label for="name"> Harga Satuan</label>
                <input type="number" class="form-control" name="harga_satuan">
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
@endsection
