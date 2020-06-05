<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelBuku; 
use App\GenreModel;
use App\ModelPinjaman;
use DB;
use View;
use Input;
use Redirect;
use Session;

class Genre extends Controller {

    public function index()
    {
        $data = DB::table('genre')->paginate(4);
        // dd($data);
        return View::make('genre')->with('genre', $data);
    }
    public function cari_genre(Request $request)
    {
        $cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$data = DB::table('genre')
		->where('genre','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return View::make('genre')->with('genre', $data); 
    }
    public function tambah_genre()
    {
        $data = DB::table('genre')->get();
        return view ('tambah_genre',$data);
    }
    public function simpan_tambah(Request $req) 
    {

        $this->validate($req,
            [
                'genre'=>'required'
            ]
        );
                $objek=array(
                    'genre'=>$req->genre
        );
        $cek_tambah=GenreModel::insert($objek);
        if($cek_tambah){
            Session::flash('alert_pesan', 'Sukses Menambah Data Genre');
            return redirect('genre');
        }else{
            Session::flash('alert_pesan', 'Gagal Menambah Data Genre');
            return redirect('genre');
        }
    }

    public function edit_genre($id)
    {
        $data['g'] = DB::table('genre')->where('id_genre',$id)->first();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view ('edit_genre',$data);
    }

    public function update(Request $req)
    {
       // dd($req->all());
       $this->validate($req,
       [
           'genre'=>'required'
       ]
       );
            $objek=array(
            'genre'=>$req->genre
            );
            $cek_upload=GenreModel::where('id_genre', $req->id_genre)->update($objek);
            if($cek_upload){
            session::flash('alert_pesan','Sukses Mengubah Data Genre');
            return redirect('genre');
            }else{
            session::flash('alert_pesan','Gagal Mengubah Data Genre');
            return redirect('genre');
            }
        }  
        public function hapus_genre($id)
        {
            $cek_hapus=GenreModel::where('id_genre', $id)->delete();
            if($cek_hapus){
                Session::flash('alert_pesan', 'Sukses Menghapus Data Genre');
            }else{
                Session::flash('alert_pesan', 'Gagal Menghapus Data Genre');
            }
            return redirect('genre');
        }
}
 

/* End of file Genre.php */
