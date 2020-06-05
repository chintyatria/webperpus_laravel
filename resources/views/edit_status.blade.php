@extends('template')
@section('konten')
<section id="main-content">
    <section class="wrapper">
    <div class="table-agile-info">
        <div class="panel panel-default">
        <div class="panel-heading">Edit</div>
            <form action="{{ url('/riwayat/validateEditStatus') }}" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="id_pinjam" id="" value="{{ $detail_buku->id }}" readonly>
                @if(Auth::user()->jabatan == 'ADMIN')
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="{{$detail_buku->status}}">{{$detail_buku->status}}</option>
                        @if ($detail_buku->status == 'belum kembali')
                            <option value="sudah kembali">sudah kembali</option>
                        @elseif ($detail_buku->status == 'sudah kembali')
                            <option value="belum kembali">belum kembali</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" class="form-control" value="{{ $detail_buku->tgl_kembali }}">
                </div>
                <div class="form-group">
                    <label for="">Denda (isi jika ada)</label>
                    <input type="number" name="denda" id="" class="form-control" value="{{ $detail_buku->denda }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                @endif
            </form>
        </div>
    </div>
    </section>
</section>
@stop
<!-- <input type="hidden" name="id_buku" value="{{$detail_buku->id_buku}}">
                Status : <input type="text" name="judul" class="form-control" value="{{$detail_buku->judul}}">
                <input type="submit" name="edit" value="Edit" class="btn btn-success"> -->