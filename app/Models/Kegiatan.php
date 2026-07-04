<?php

namespace App\Models;

use App\Enums\StatusPersetujuan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table        = "tbl_kegiatan";
    protected $primaryKey   = "idkegiatan";
    protected $fillable     = [
        'namakegiatan',
        'lembagapenyelenggara',
        'lembagamitra',
        'lokasikegiatan',
        'tglmulai',
        'tglakhir',
        'jmlpenceramah',
        'jmlpengajar',
        'jmlpeserta',
        'jmlpenerjemah',
        'totalpanitia',
        'idjenisprogram',
        'idnondiklat',
        'idmodakegiatan',
        'jmlpengarah',
        'jmlpenanggungjawab',
        'jmlketua',
        'jmlanggotapenjabakademik',
        'jmlanggotapanitiakelas',
        'jmladmindigital',
        'jmlpetugaskeuangan',
        'jmlnotulen',
        'jmlmoderator',
        'jmlpanitialainnya',
        'jmlpanitia',
        'jmljamkegiatan',
        'waktuperjp',
        'jmlatkpanitia',
        'jmlatkkegiatan',
        'jmlhapd',
        'jmlperlengkapan',
        'jmlkonsumsi',
        'jmlsertifikat',
        'jmlspanduk',
        'jmlfotocopybahan',
        'jmlmodul',
        'pengirimanmodul',
        'jmlkendaraan',
        'jmlaula',
        'jmlruangkelas',
        'jmlorangfullboard',
        'jmlkamarfullboard',
        'jmlorangperkamar',
        'jmlorangfullday',
        'deskripsikegiatan',
        'tujuankegiatan',
        'persyaratanpeserta',
        'informasitahapankegiatan',
        'idpegawai',
        'idkodekegiatan',
        'idkoderokro',
        'kodesubkro',
        'kodekomponen',
        'kodeakun',
        'idgambar',
        'status',
    ];

    protected $casts = [
        'status' => StatusPersetujuan::class,
        'tglmulai' => 'date',
        'tglakhir' => 'date',
    ];

    // Relasi ke jenis program
    public function jenis()
    {
        return $this->belongsTo(JenisProgram::class, 'idjenisprogram');
    }

    // Relasi ke non diklat
    public function nondiklat()
    {
        return $this->belongsTo(JenisNonDiklat::class, 'idnondiklat');
    }

    // Relasi ke moda kegiatan
    public function modakegiatan()
    {
        return $this->belongsTo(ModaKegiatan::class, 'idmodakegiatan');
    }

    // Relasi hasMany ke detail-detail kegiatan
    public function penceramah()
    {
        return $this->hasMany(Penceramah::class, 'idkegiatan');
    }

    public function pengajar()
    {
        return $this->hasMany(Pengajar::class, 'idkegiatan');
    }

    public function penerjemah()
    {
        return $this->hasMany(Penerjemah::class, 'idkegiatan');
    }

    public function pembiayaanDetail()
    {
        return $this->hasMany(PembiayaanDetail::class, 'idkegiatan');
    }

    public function apdDetail()
    {
        return $this->hasMany(ApdDetail::class, 'idkegiatan');
    }

    public function perlengkapanDetail()
    {
        return $this->hasMany(PerlengkapanDetail::class, 'idkegiatan');
    }

    public function konsumsiDetail()
    {
        return $this->hasMany(KonsumsiDetail::class, 'idkegiatan');
    }

    public function matrixKegiatan()
    {
        return $this->hasMany(MatrixKegiatan::class, 'idkegiatan');
    }

    // Scope eager-load semua relasi kegiatan
    public function scopeWithAllRelations($query)
    {
        return $query->with([
            'penceramah',
            'pengajar',
            'penerjemah',
            'pembiayaanDetail.pembiayaan',
            'apdDetail.apd',
            'perlengkapanDetail.perlengkapan',
            'konsumsiDetail.konsumsi',
            'matrixKegiatan',
        ]);
    }

    // Scope eager-load untuk list dengan statistik
    public function scopeWithStatistik($query)
    {
        return $query->with(['jenis', 'nondiklat', 'modakegiatan']);
    }

    public function getCreatedAtAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }
}
