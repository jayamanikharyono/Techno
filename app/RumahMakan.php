<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumahMakan extends Model
{
    protected $table = 'rumahmakan';
    protected $fillable = ['image','nama_rm','nomor','nama_pemilik','kota','alamat','username','password'];
}
