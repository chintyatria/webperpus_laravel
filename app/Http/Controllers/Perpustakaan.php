<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModelBuku; 
use App\GenreModel;
use App\ModelPinjaman;
use Session;
// use Illuminate\Support\Facades\BD;
 
class Perpustakaan extends Controller 
{   
    public function index() 
    {
        $data['datas']=ModelBuku::join('genre','genre.id_genre','buku.id_genre')->paginate(4);
        // dd($data);
        return view('buku',$data); //return view('buku',$data); buku adalah view buku.blade.php
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $data['datas']=ModelBuku::join('genre','genre.id_genre','buku.id_genre')
		->where('judul','like',"%".$cari."%")
        ->paginate();
        return view('buku',$data);
    }
    public function tambah()
    {
        $data['genre']=GenreModel::all();
        return view ('tambah_buku',$data);
    } 
    public function simpan_tambah(Request $req) 
    {
        $this->validate($req,
            [
                'judul'=>'required',
                'penulis'=>'required',
                'tahun_terbit'=>'required',
                'gambar'=>'required|image|mimes:jpg,png,jpeg',
                'id_genre'=>'required',
                'stok_buku'=>'required'
            ]
    );
    $file=$req->file('gambar');
    $cek_tambah=$file->move("gambar", $file->getClientOriginalName());
    if($cek_tambah){
        $objek=array(
            'judul'=>$req->judul,
            'penulis'=>$req->penulis,
            'tahun_terbit'=>$req->tahun_terbit,
            'gambar'=>$file->getClientOriginalName(),
            'id_genre'=>$req->id_genre,
            'stok_buku'=>$req->stok_buku
        ); 
        $cek_tambah=ModelBuku::insert($objek);
        if($cek_tambah){
            Session::flash('alert_pesan', 'Sukses Menambah Data Buku');
            return redirect('buku');
        }else{
            Session::flash('alert_pesan', 'Gagal Menambah Data Buku');
            return redirect('buku');
        }
    }
    }
    public function edit($id)
    {
        $data['detail_buku']=ModelBuku::where('id_buku', $id)->first(); 
        $data['genre']=GenreModel::get();
        return view('edit_buku', $data);
    }
    public function update(Request $req)
    {
        // dd($req->all());
        $this->validate($req,
                [
                    'judul'=>'required',
                    'penulis'=>'required',
                    'tahun_terbit'=>'required',
                    'gambar'=>'required|image|mimes:jpg,png,jpeg',
                    'id_genre'=>'required'
                ]
        );
        $file=$req->file('gambar');
        $cek_upload=$file->move("gambar", $file->getClientOriginalName());
        if($cek_upload){
        $objek=array(
            'judul'=>$req->judul,
            'penulis'=>$req->penulis,
            'tahun_terbit'=>$req->tahun_terbit,
            'gambar'=>$file->getClientOriginalName(),
            'id_genre'=>$req->id_genre
        );
        $cek_upload=ModelBuku::where('id_buku', $req->id_buku)->update($objek);
        if($cek_upload){
            session::flash('alert_pesan','Sukses Mengubah Data Buku');
            return redirect('buku');
        }else{
            session::flash('alert_pesan','Gagal Mengubah Data Buku');
            return redirect('buku');
        }
    }  
    }
    public function hapus($id)
    {
        $cek_hapus=ModelBuku::where('id_buku', $id)->delete();
        if($cek_hapus){
            Session::flash('alert_pesan', 'Sukses Menghapus Data Buku');
        }else{
            Session::flash('alert_pesan', 'Gagal Menghapus Data Buku');
        }
        return redirect('buku');
    }
    public function pinjam($id_buku)
    {
        $data = ModelBuku::where('id_buku', $id_buku)->first();
        return view('pinjam_buku', compact('data'));
    }

    // public function pinjam()
    // {
    //     $data['pinjaman']=GenreModel::all();
    //     // $data['genre']=GenreModel::get();
    //     // return view ('pinjam_buku',$data);
    //     return view('pinjam_buku', compact(' select*from buku where id_buku = id_buku->()'),$data);
    // }
    public function proses_pinjam(Request $req)
    {
        $this->validate($req,
            [
                // 'nama'=>'required',
                'no_telp'=>'required',
                'tgl_pinjam'=>'required',
                // 'tgl_kembali'=>'required', 
                'id_buku'=>'required',
                'stok_buku' => 'required',     
                // 'status'=>'required'
            ]
        );
        $pinjaman = new ModelPinjaman;
        $buku = ModelBuku::where('id_buku', $req->id_buku)->first();

        $pinjaman->nama = \Auth::user()->username;
        $pinjaman->no_telp = $req->no_telp;
        $pinjaman->tgl_pinjam = $req->tgl_pinjam;
        $pinjaman->id_buku = $req->id_buku;
        $pinjaman->status = "belum kembali";
        $pinjaman->stok_buku = $req->stok_buku;

        $buku->stok_buku -= $req->stok_buku;

        $pinjaman->save();
        $buku->save();

        return view('welcome');
    }
    
    
}