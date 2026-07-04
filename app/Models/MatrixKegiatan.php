<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixKegiatan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table        = "tbl_matrix_kegiatan";
    protected $primaryKey   = "idmatrixkegiatan";
    protected $fillable     = [
        'idkegiatan',
        'tanggal',
        'waktumulai',
        'waktuselesai',
        'agenda',
        'pic',
        'jamperjp',
        'lokasi',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'idkegiatan');
    }
}
