<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apd extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table        = "tbl_apd";
    protected $primaryKey   = "idapd";
    protected $fillable     = ['idapd','namaapd'];
}
