<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisNonDiklat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = "tbl_nondiklat";
    protected $primaryKey   = "idnondiklat";
    protected $fillable     = ['idnondiklat','idjenisprogram','namadiklat'];

    public function jenisprogram()
    {
        return $this->belongsTo(JenisProgram::class, 'idjenisprogram');
    }
}
