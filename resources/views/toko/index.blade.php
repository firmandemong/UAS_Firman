
<!-- {{-- MENAMPILKAN TAMPILAN YANG ADA DI FOLDER LAYOUTS --}} -->
@extends('layouts.appp')

<!-- {{-- UNTUK MENAMPILKAN FORM UNTUK PENJUALAN --}} -->
<?php $no = 1; ?>
@section('content')
    <h3>Data Stok</h3>
    <!-- <a href="/toko/create" class="btn btn-success"> Tambah Data</a> -->
    <button type='button' class='btn btn-primary ml-3' data-toggle="modal" data-target="#tambah"> Add</button>
    <div class="col-sm-12">

        @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
        @endif
    </div>


    <table class="table table-striped mt-3">
        <thead>
            <tr>
               
                <th> ID </th>
                <th> Nama Barang </th>
                <th> Jumlah </th>
                <th> Tanggal Masuk </th>
                <th> Harga Satuan </th>
                <th colspan=2></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($inventokos as $inventoko)
                <tr>
                    <td> {{ $no++ }}</td>
                
                    <td> {{ $inventoko->nama_barang }}</td>
                    <td> {{ $inventoko->jumlah }}</td>
                    <td> {{ $inventoko->tanggal_masuk }}</td>
                    <td> {{ $inventoko->harga_satuan }}</td>
                    <td>
                        <a  data-toggle="modal"  data-tanggal="{{ $inventoko->tanggal_masuk }}" data-harga="{{ $inventoko->harga_satuan }}" data-id="{{ $inventoko->id }}" data-nama="{{ $inventoko->nama_barang }}" data-jumlah="{{ $inventoko->jumlah }}" data-target="#edit" class="btn btn-primary btnEdit text-light"> Edit</a>
                    </td>
                    <td>
                        <form action="/toko/{{ $inventoko->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id='tambah'  class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="/toko">
            @csrf
                        <div class="form-group">
                <label for="name"> Nama Barang </label>
                   <input type="text" class="form-control" name="nama_barang" placeholder="--Isi Nama Pembeli">
            </div>
            <div class="form-group">
                <label for="name"> Jumlah </label>
                <input type="number" class="form-control" name="jumlah" placeholder="--Isi Jumlah">
            </div>
            <div class="form-group">
                <label for="name"> Tanggal Masuk </label>
                <input type="date" class="form-control" name="tanggal_masuk" >
            </div>
            <div class="form-group">
                <label for="name"> Harga Satuan</label>
                <input type="number" class="form-control" name="harga_satuan" placeholder="-- Tentukan Harga Barang">
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>


<div id='edit'  class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" id="formEdit">
            @csrf
            @method('PUT')
                        <div class="form-group">
                <label for="name"> Nama Barang </label>
                <input type="text" class="form-control" name="nama_barang" id="namaBarang">
            </div>
            <div class="form-group">
                <label for="name"> Jumlah </label>
                <input type="number" class="form-control" name="jumlah" id="jumlah">
            </div>
            <div class="form-group">
                <label for="name"> Tanggal Masuk </label>
                <input type="date" class="form-control" name="tanggal_masuk" id="tanggalMasuk">
            </div>
            <div class="form-group">
                <label for="name"> Harga Satuan</label>
                <input type="number" class="form-control" name="harga_satuan" id="hargaSatuan">
            </div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>
    </div>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>


    @endsection

           
    @section('script')

    <script>

    $('.btnEdit').on('click',function(){
        var id = $(this).attr('data-id');
        $('#namaBarang').val($(this).attr('data-nama'));
        $('#jumlah').val($(this).attr('data-jumlah'));
        $('#tanggalMasuk').val($(this).attr('data-tanggal'));
        $('#hargaSatuan').val($(this).attr('data-harga'));
        $('#formEdit').prop('action','/toko/'+id);
    })

</script>
    @endsection