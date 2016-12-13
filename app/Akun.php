<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'user';
    protected $fillable = ['name','nomor_id','jenis_id','kota','alamat','jk','username','password'];
}
