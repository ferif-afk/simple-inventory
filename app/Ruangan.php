<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $fillable = ['id_jurusan', 'nama_ruangan'];

    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
}
