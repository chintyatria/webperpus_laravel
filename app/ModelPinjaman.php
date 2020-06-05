<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPinjaman extends Model
{
    protected $table ="pinjaman";
    // protected $primarykey ="id_pinjam";
    // protected $fillable = ['nama', 'no_telp', 'tgl_pinjam', 'tgl_kembali', 'id_buku'];
    public $timestamps =false;

    

}