@extends('template')
@section('konten')
<section id="main-content">
    <section class="wrapper">
    <div class="table-agile-info">
        <div class="panel panel-default">
        <div class="panel-heading">Edit genre</div>
        @if($errors->any())
        <div class="alert alert-success">
            @foreach($errors->all() as $error)
            <strong>{{$error}}</strong>
            @endforeach
        </div>
        @endif
            <form action="{{url('/genre/update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field() }} {{method_field('PUT')}}
                <input type="hidden" name="id_genre" value="{{$g->id_genre}}">
                Nama Genre : <input type="text" name="genre" class="form-control" value="{{$g->genre}}">
                <input type="submit" name="edit" value="Edit" class="btn btn-success">
            </form>
        </div>
    </div>
    </section>
</section>
@stop