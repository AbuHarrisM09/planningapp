<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerjemah extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_penerjemah";
    protected $primaryKey   = "idpenerjemah";
    protected $fillable     = ['namapenerjemah', 'idkegiatan', 'keterangan'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
