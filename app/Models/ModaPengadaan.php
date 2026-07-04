<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModaPengadaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = "tbl_modapengadaan";
    protected $primaryKey   = "idmodapengadaan";
    protected $fillable     = ['idmodapengadaan','jenismodapengadaan'];
}
