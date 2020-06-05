@extends('template')
@section('konten')
<!DOCTYPE html>
<html lang="en">
<head>
<title>Perpustakaan Kota
</title>
<style type="text/css">
.img
{
    width: 100px;
    height: 100px;
    }
    </style>
</head>
<body>
@if(Auth::user()->jabatan == 'ADMIN')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">Data Buku</div><br>
                        <ul class="nav pull-right top-menu">
                <p>Cari Judul Buku :</p>
                <form action="{{url('/buku/cari')}}" method="GET">
                    <input type="text" name="cari" placeholder="Cari .." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                </form>
                </ul>
                <a href="{{url('/buku/tambah')}}" class="btn btn-primary" data-toggle="modal">Tambah</a><br><br>
            <div class="body">
                @if(Session::get('alert_pesan'))
                <div class="alert alert-success">
                <strong>{{Session::get('alert_pesan')}}</strong>
                </div>
                @endif
            <div>
            <table class="table">
            <thead>
            <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Nama Penulis</th>
            <th>Tahun Terbit</th>
            <th>Gambar</th>
            <th>Genre</th>
            <th>Stok</th>
            <th>Aksi</th>
            </tr>
            @php $no=0; @endphp
            @foreach($datas as $data)
            @php $no++; 
            @endphp
            <tr>
            <td>{{$no}}</td>
            <td>{{$data->judul}}</td>
            <td>{{$data->penulis}}</td>
            <td>{{$data->tahun_terbit}}</td>
            <td><img class="img" src="{{asset('gambar').'/'.$data->gambar}}"></td>
            <td>{{$data->genre}}</td>
            <td>{{$data->stok_buku}}</td>
            <td><a href="{{url('/buku/edit/'.$data->id_buku)}}" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"></i></a></td>
            <td><a href="{{url('/buku/hapus/'.$data->id_buku)}}" class="btn btn-danger" 
            onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
            </thead>
            </table>
            <br/>
            Halaman : {{ $datas->currentPage() }} <br/>
            Jumlah Data : {{ $datas->total() }} <br/>
            Data Per Halaman : {{ $datas->perPage() }} <br/>
        
        
            {{ $datas->links() }}
            </div>
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
            <div class="panel-heading">Data Buku</div><br>
            <div class="body">
                        <ul class="nav pull-right top-menu">
                <p>Cari Judul Buku :</p>
                <form action="{{url('/buku/cari')}}" method="GET">
                    <input type="text" name="cari" placeholder="Cari .." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                </form>
                </ul>
                @if(Session::get('alert_pesan'))
                <div class="alert alert-success">
                <strong>{{Session::get('alert_pesan')}}</strong>
                </div>
                @endif
            <div>
            <table class="table">
            <thead>
            <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Nama Penulis</th>
            <th>Tahun Terbit</th>
            <th>Gambar</th>
            <th>Genre</th>
            <th>Aksi</th>
            </tr>
            @php $no=0; @endphp
            @foreach($datas as $data)
            @php $no++; 
            @endphp
            <tr>
            <td>{{$no}}</td>
            <td>{{$data->judul}}</td>
            <td>{{$data->penulis}}</td>
            <td>{{$data->tahun_terbit}}</td>
            <td><img class="img" src="{{asset('gambar').'/'.$data->gambar}}"></td>
            <td>{{$data->genre}}</td>
            <td><a href="{{url('/buku/pinjam',$data->id_buku)}}" class="btn btn-primary" data-toggle="modal">Pinjam</a></td>
            </tr>
            @endforeach
            </thead>
            </table>
            <br/>
            Halaman : {{ $datas->currentPage() }} <br/>
            Jumlah Data : {{ $datas->total() }} <br/>
            Data Per Halaman : {{ $datas->perPage() }} <br/>
        
        
            {{ $datas->links() }}
            </div>
            </div>
            </div>
            </div>
            </section>
        </section>
    </body> 
</html>
@endif
@stop 