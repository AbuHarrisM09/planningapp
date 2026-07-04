<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penceramah extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_penceramah";
    protected $primaryKey   = "idpenceramah";
    protected $fillable     = ['namapenceramah', 'idkegiatan', 'keterangan'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
