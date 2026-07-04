<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerlengkapanDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_perlengkapandetail";
    protected $primaryKey   = "idperlengkapandetail";
    protected $fillable     = ['idperlengkapan', 'idkegiatan', 'jmlperlengkapan'];

    public function perlengkapan()
    {
        return $this->belongsTo(Perlengkapan::class, 'idperlengkapan');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
