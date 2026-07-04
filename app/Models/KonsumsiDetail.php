<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsumsiDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_konsumsidetail";
    protected $primaryKey   = "idkonsumsidetail";
    protected $fillable     = ['idkonsumsi', 'idkegiatan', 'jmlkonsumsi'];

    public function konsumsi()
    {
        return $this->belongsTo(Konsumsi::class, 'idkonsumsi');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
