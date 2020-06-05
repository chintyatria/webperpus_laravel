@extends('template')
@section('konten')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-heading">Pinjam Buku</div>
            @if($errors->any())
            <div class="alert alert-success">
                @foreach($errors->all() as $error) 
                <strong>{{$error}}</strong><br>
                @endforeach
            </div>
            @endif
            <form action="{{url('/buku/proses_pinjam')}}" method="post" enctype="multipart/form-data">
                {{csrf_field() }}
                <input type="hidden" name="id_buku" class="form-control" value="{{$data->id_buku}}">
                Judul Buku : <p>{{$data->judul}}</p>
                Nama Peminjam : <p>{{ Auth::user()->username }}</p>
                Nomor Telepon : <input type="tel" name="no_telp" class="form-control">
                Tanggal Pinjam : <input type="date" name="tgl_pinjam" class="form-control">
                Jumlah : <input type="number" name="stok_buku" id="" class="form-control">
                <input type="submit" name="pinjam" value="Pinjam" class="btn btn-success">
                <a href="{{url('buku')}}" class="btn btn-primary nav pull-right bottom-menu">Kembali</a>
            </form> 
            </div>
        </div>
    </section>
</section>
@stop