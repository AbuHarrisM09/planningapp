<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembiayaanDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_pembiayaandetail";
    protected $primaryKey   = "idpembiayaandetail";
    protected $fillable     = ['idpembiayaan', 'idkegiatan'];

    public function pembiayaan()
    {
        return $this->belongsTo(Pembiayaan::class, 'idpembiayaan');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
