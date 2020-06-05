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
            <div class="panel-heading">Data Genre</div><br>
                        <ul class="nav pull-right top-menu">
                <p>Cari Data :</p>
                <form action="{{url('/genre/cari_genre')}}" method="GET">
                    <input type="text" name="cari" placeholder="Cari .." value="{{ old('cari') }}">
                    <input type="submit" value="CARI">
                </form>
                </ul>
                <a href="{{url('/genre/tambah_genre')}}" class="btn btn-primary" data-toggle="modal">Tambah</a><br><br>
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
            <th>Nama Genre</th> 
            <th>Aksi</th>
            </tr>
            @php $no=0; @endphp
            @foreach($genre as $g)
            @php $no++; @endphp
            <tr>
            <td>{{$no}}</td>
            <td>{{$g->genre}}</td>
            <td><a href="{{url('/genre/edit_genre/'.$g->id_genre)}}" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"></i></a>
            <a href="{{url('/genre/hapus_genre/'.$g->id_genre)}}" class="btn btn-danger" 
            onclick="return confirm('Apakah Anda Yakin Menghapus Data?')"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
            </thead>
            </table>
            <br/>
            Halaman : {{ $genre->currentPage() }} <br/>
            Jumlah Data : {{ $genre->total() }} <br/>
            Data Per Halaman : {{ $genre->perPage() }} <br/>
        
        
            {{ $genre->links() }}
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
            <div class="panel-heading">Data Genre</div><br>
            <div class="body">
                        <ul class="nav pull-right top-menu">
                <p>Cari Data :</p>
                <form action="{{url('/genre/cari_genre')}}" method="GET">
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
            <th>Nama Genre</th>
            </tr>
            @php $no=0; @endphp
            @foreach($genre as $data)
            @php $no++; 
            @endphp
            <tr>
            <td>{{$no}}</td>
            <td>{{$data->genre}}</td>
            </tr>
            @endforeach
            
            </thead>
            </table>
            <br/>
            Halaman : {{ $genre->currentPage() }} <br/>
            Jumlah Data : {{ $genre->total() }} <br/>
            Data Per Halaman : {{ $genre->perPage() }} <br/>
        
        
            {{ $genre->links() }}
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