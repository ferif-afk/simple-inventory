<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['id_ruangan', 'nama_barang', 'total', 'broken', 'gambar', 'created_by', 'updated_by' ];

    public function ruangan()
    {
    	return $this->belongsTo('App\Ruangan', 'id_ruangan');
    }
       public function user_c(){
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function user_u(){
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }
}