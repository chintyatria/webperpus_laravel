@extends('template')
@section('konten')
<section id="main-content">
    <section class="wrapper">
    <div class="table-agile-info">
        <div class="panel panel-default">
        <div class="panel-heading">Edit Buku</div>
        @if($errors->any())
        <div class="alert alert-success">
            @foreach($errors->all() as $error)
            <strong>{{$error}}</strong>
            @endforeach
        </div> 
        @endif
            <form action="{{url('/buku/update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field() }} {{method_field('PUT')}}
                <input type="hidden" name="id_buku" value="{{$detail_buku->id_buku}}">
                Judul : <input type="text" name="judul" class="form-control" value="{{$detail_buku->judul}}">
                Nama Penulis : <input type="text" name="penulis" class="form-control" value="{{$detail_buku->penulis}}">
                Tahun Terbit : <input type="text" name="tahun_terbit" class="form-control" value="{{$detail_buku->tahun_terbit}}">
                Gambar : <input type="file" name="gambar" class="form-control" value="{{$detail_buku->gambar}}">
                Genre : <select class="form-control" name="id_genre">
                    <option></option>
                        @foreach($genre as $gen)
                        @if($detail_buku->id_genre == $gen->id_genre)
                        @php $select="selected"; @endphp
                        @else
                        @php $select=""; @endphp
                        @endif
                        <option {{$select}} value="{{$gen->id_genre}}">{{$gen->genre}}</option>
                        @endforeach
                </select>
                <input type="submit" name="edit" value="Edit" class="btn btn-success">
            </form>
        </div> 
    </div>
    </section>
</section>
@stop