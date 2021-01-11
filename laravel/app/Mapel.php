<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kodemapel','user_id','mapel','guru','kelas_user'];
    protected $primarykey='id';
}
