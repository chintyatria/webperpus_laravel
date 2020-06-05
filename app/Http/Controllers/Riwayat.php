<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelBuku; 
use App\GenreModel;
use App\ModelPinjaman;
use App\RiwayatModel;
use View;
use DB;
use Redirect;
use Input;
use Session;

class Riwayat extends Controller {

    public function index()
    {
        if(\Auth::user()->jabatan == 'ADMIN'){
            $datas=ModelPinjaman::join('buku','buku.id_buku','pinjaman.id_buku')->paginate(4);
        }

        else {
            $datas=ModelPinjaman::where('nama', \Auth::user()->username)->join('buku','buku.id_buku','pinjaman.id_buku')->paginate(4);
        }

        // dd($datas);
        return view('riwayat', compact('datas'));
    }
    public function edit_status($id)
    {
        $detail_buku=ModelPinjaman::where('id', $id)->first();
        $genre=GenreModel::get();
        return view('edit_status', compact('genre', 'detail_buku'));
    }
   
    public function validateEditStatus(Request $request)
    {
        $pinjaman = ModelPinjaman::where('id', $request->id_pinjam)->first();
        $pinjaman->status = $request->input('status');
        $pinjaman->tgl_kembali = $request->input('tgl_kembali');
        $pinjaman->denda = $request->input('denda');
        $pinjaman->save();

        if($request->input('status') == 'sudah kembali'){
            $buku = ModelBuku::where('id_buku', $pinjaman->id_buku)->first();
            $buku->stok_buku += $pinjaman->stok_buku;
            $buku->save();
        }

        return redirect('riwayat');
    }

}

/* End of file Pinjaman.php */
