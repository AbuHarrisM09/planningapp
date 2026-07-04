<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_pengajar";
    protected $primaryKey   = "idpengajar";
    protected $fillable     = ['namapengajar', 'idkegiatan', 'keterangan'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
