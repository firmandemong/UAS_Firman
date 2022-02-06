@extends('layouts.appp')

<!-- {{-- UNTUK MENAMPILKAN FORM UNTUK PENJUALAN --}} -->
<?php $no = 1; ?>
@section('content')
    <h3>Data Stok</h3>
    <!-- <a href="/toko/create" class="btn btn-success"> Tambah Data</a> -->
    <a type='button' class='btn btn-primary ml-3' href="/transaksi/create"> Add</a>
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
               
                <th> Nama Pembeli </th>
                <th> Nama Barang </th>
                <th> Jumlah </th>
                <th> Total Harga </th>
                <th colspan=2></th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($transaksis as $transaksi)

                <tr>
                    <td> {{ $no++ }}</td>
                
                   
                    <td> {{ $transaksi->nama_pembeli }}</td>
                    <td> {{ $barangs[$loop->index]}}</td>
                    <td> {{ $transaksi->jumlah }}</td>
                    <td> {{ $transaksi->total_harga }}</td>
                    <td>
                        <a  data-toggle="modal"  data-tanggal="{{ $transaksi->nama_barang }}" 
                        data-harga="{{ $transaksi->nama_pembeli }}" data-id="{{ $transaksi->id }}" 
                        data-nama="{{ $transaksi->jumlah }}" data-jumlah="{{ $transaksi->total_harga }}" 
                        data-target="#edit" class="btn btn-primary btnEdit text-light"> Edit</a>
                    </td>
                    <td>
                        <form action="/transaksi/{{ $transaksi->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
