<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';
	protected $fillable = ['id_pemesan','nama_pemesan','pesanan','jumlah','total','rumahmakan_id','nama_rm','status','tanggal','pukul'];
}
