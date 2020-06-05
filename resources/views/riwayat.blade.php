@extends('template')
@section('konten')
<!DOCTYPE html>
<html lang="en">
<head>
<title>Perpustakaan Kota</title>
</head>
<body>
@if(Auth::user()->jabatan == 'ADMIN')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">Riwayat Pinjaman</div><br>
            <div>
            <table class="table">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No. Telepon</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Judul Buku</th>
            <th>Status</th>
            <th>Aksi</th>
            </tr>
            @php $no=0; @endphp
            @foreach($datas as $data)
            @php $no++; 
            @endphp
            <tr>
            <td>{{$no}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->no_telp}}</td>
            <td>{{$data->tgl_pinjam}}</td>
            <td>{{$data->tgl_kembali}}</td>
            <td>{{$data->judul}}</td>
            <td>{{$data->status}}</td>
            <td><a href="{{url('/riwayat/edit_status/'.$data->id)}}" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"></i></a></td>
            </tr>
            @endforeach
            </thead>
            </table>
            Halaman : {{ $datas->currentPage() }} <br/>
            Jumlah Data : {{ $datas->total() }} <br/>
            Data Per Halaman : {{ $datas->perPage() }} <br/>
        
        
            {{ $datas->links() }}
            </div>
            </div>
            </div>
            </section>
        </section>
    @else
    <section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">Riwayat Pinjaman</div><br>
            <div>
            <table class="table">
            <thead>
            <tr>
            <th>No</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Judul Buku</th>
            <th>Status</th>
            <th>Denda</th>
            </tr>
            @php $no=0; @endphp
            @foreach($datas as $data)
            @php $no++; 
            @endphp
            <tr>
            <td>{{$no}}</td>
            <td>{{$data->tgl_pinjam}}</td>
            <td>{{$data->tgl_kembali}}</td>
            <td>{{$data->judul}}</td>
            <td>{{$data->status}}</td>
            <td>
                @if(!is_null($data->denda))
                    {{$data->denda}}
                @else
                    --
                @endif
            </td>
            </tr>
            @endforeach
            </thead>
            </table>
            Halaman : {{ $datas->currentPage() }} <br/>
            Jumlah Data : {{ $datas->total() }} <br/>
            Data Per Halaman : {{ $datas->perPage() }} <br/>
        
        
            {{ $datas->links() }}
            </div>
            </div>
            </div>
            </section>
        </section>
    </body> 
</html>
@endif
@stop 