<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = "tbl_perlengkapan";
    protected $primaryKey   = "idperlengkapan";
    protected $fillable     = ['idperlengkapan','namaperlengkapan'];
}
