@extends('template')
@section('konten')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-heading">Tambah Genre</div>
            @if($errors->any())
            <div class="alert alert-success">
                @foreach($errors->all() as $error)
                <strong>{{$error}}</strong><br>
                @endforeach
            </div>
            @endif
            <form action="{{url('/genre/simpan_tambah')}}" method="post" enctype="multipart/form-data">
                {{csrf_field() }}
                Nama Genre : <input type="text" name="genre" class="form-control">
                <input type="submit" name="tambah" value="Tambah" class="btn btn-success">
            </form>
            </div>
        </div>
    </section>
</section>
@stop