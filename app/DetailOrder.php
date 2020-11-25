<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_detail_order';
    protected $primaryKey = 'id_detail_order';
    protected $fillable = 
    ['id_detail_order','id_order','kode_order','id_masakan','nama_masakan','harga_masakan','jumlah_pesan','no_meja','status'];
}
