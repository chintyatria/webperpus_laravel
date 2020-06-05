@extends('template')

@section('konten')
<br><br><br>
<br>
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">Halaman Utama</div><br>
            @if(Auth::user()->jabatan == 'ADMIN')
                <div class="panel-body">
                SELAMAT DATANG DI WEBSITE PERPUSTAKAAN KOTA SEBAGAI ADMIN
                </div>
                @else
                <div class="panel-body">
                SELAMAT DATANG DI WEBSITE PERPUSTAKAAN KOTA SEBAGAI USER
                </div>
                @endif
        </div>
        </div>
    </section>
</section>
@endsection
