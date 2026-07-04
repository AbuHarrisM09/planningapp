<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApdDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_apddetail";
    protected $primaryKey   = "idapddetail";
    protected $fillable     = ['idapd', 'idkegiatan', 'jmlhapd'];

    public function apd()
    {
        return $this->belongsTo(Apd::class, 'idapd');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
