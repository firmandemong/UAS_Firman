@extends('layouts.appp')
 
@section('content')
<form class="mt-3" method="post" action="/transaksi">
{{ csrf_field() }}

<!--form untuk menginput -->
  <div class="form-group">
  <label for="exampleInputEmail1">Nama Pembeli</label>
    <input type="text" class="form-control" name="nama_pembeli" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Input Nama Pembeli" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Barang</label>
    <select class="form-control" name="barang_id">
    @foreach($barang as $barangs)
        @if($barangs->jumlah >0)
            <option value="{{$barangs->id}}">{{$barangs->nama_barang}}</option>
        @endif
    @endforeach
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jumlah</label>
    <input type="number" class="form-control" name="jumlah" id="exampleInputPassword1" placeholder="Jumlah Barang Pembeli" required>
  </div>
  <button type="submit" class="btn btn-success" style="float:right">Simpan</button>
</form>
@endsection

