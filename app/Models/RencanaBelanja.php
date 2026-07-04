<?php

namespace App\Models;

use App\Enums\StatusPersetujuan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaBelanja extends Model
{
    use HasFactory;

    protected $table        = "tbl_rencanabelanja";
    protected $primaryKey   = "idbelanjabarang";
    protected $fillable = [
        'namakegiatanbb',
        'lembagapenyelenggarabb',
        'lembagamitrabb',
        'lokasikegiatanbb',
        'tglmulaibb',
        'tglakhirbb',
        'jmlketua',
        'jmlsekretaris',
        'jmlanggota',
        'jmlpetugaskeuangan',
        'deskripsiprogrambb',
        'tujuanprogrambb',
        'persyaratanvendorbb',
        'informasitahapanprogrambb',
        'idjenisbarang',
        'idjenisbelanjainventaris',
        'idmodapengadaan',
        'status',
    ];

    protected $casts = [
        'status' => StatusPersetujuan::class,
        'tglmulaibb' => 'date',
        'tglakhirbb' => 'date',
    ];

    // Relasi belongsTo
    public function jenisbarang()
    {
        return $this->belongsTo(JenisBarang::class, 'idjenisbarang');
    }

    public function jenisbelanja()
    {
        return $this->belongsTo(BarangInventaris::class, 'idjenisbelanjainventaris');
    }

    public function modapengadaan()
    {
        return $this->belongsTo(ModaPengadaan::class, 'idmodapengadaan');
    }

    // Relasi hasMany ke detail pembiayaan belanja
    public function pembiayaanDetailBB()
    {
        return $this->hasMany(PembiayaanDetailBelanja::class, 'idbelanjabarang');
    }

    // Scope eager-load relasi pembiayaan
    public function scopeWithPembiayaan($query)
    {
        return $query->with('pembiayaanDetailBB.pembiayaan');
    }

    // Scope untuk list dengan relasi master
    public function scopeWithRelasiMaster($query)
    {
        return $query->with(['jenisbarang', 'jenisbelanja', 'modapengadaan']);
    }

    public function getCreatedAtAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }
}
