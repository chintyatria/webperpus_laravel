@extends('template')
@section('konten')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-heading">Tambah Buku</div>
            @if($errors->any())
            <div class="alert alert-success">
                @foreach($errors->all() as $error)
                <strong>{{$error}}</strong><br>
                @endforeach
            </div>
            @endif
            <form action="{{url('/buku/simpan_tambah')}}" method="post" enctype="multipart/form-data">
                {{csrf_field() }}
                Judul : <input type="text" name="judul" class="form-control">
                Nama Penulis : <input type="text" name="penulis" class="form-control">
                Tahun Terbit : <input type="text" name="tahun_terbit" class="form-control">
                Gambar : <input type="file" name="gambar" class="form-control">
                Genre : <select class="form-control" name="id_genre">
                    <option></option>
                        @foreach($genre as $gen)
                        <option value="{{$gen->id_genre}}">{{$gen->genre}}</option>
                        @endforeach
                </select>
                Stok Buku : <input type="text" name="stok_buku" class="form-control">
                <input type="submit" name="tambah" value="Tambah" class="btn btn-success">
            </form>
            </div>
        </div>
    </section>
</section>
@stop