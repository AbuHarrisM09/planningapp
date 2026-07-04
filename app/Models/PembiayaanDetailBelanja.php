<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembiayaanDetailBelanja extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_pembiayaandetailbb";
    protected $primaryKey   = "idpembiayaandetailbb";
    protected $fillable     = ['idpembiayaan', 'idbelanjabarang'];

    public function pembiayaan()
    {
        return $this->belongsTo(Pembiayaan::class, 'idpembiayaan');
    }

    public function rencanaBelanja()
    {
        return $this->belongsTo(RencanaBelanja::class, 'idbelanjabarang');
    }
}
