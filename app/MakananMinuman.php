<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakananMinuman extends Model
{
    protected $table = 'makananminuman';
    protected $fillable = ['nama','jenis','harga','rumahmakan_id','nama_rm','image'];
}
