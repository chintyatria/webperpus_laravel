<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreModel extends Model
{
    protected $table="genre";
    protected $primarykey="id_genre";
    public $timestamps=false;
}
  