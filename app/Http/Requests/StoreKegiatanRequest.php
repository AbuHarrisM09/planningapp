<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKegiatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'namakegiatan'           => 'required|string|max:255',
            'lembagapenyelenggara'    => 'required|string|max:255',
            'lembagamitra'            => 'nullable|string|max:255',
            'lokasikegiatan'          => 'required|string|max:255',
            'tglmulai'                => 'required|date',
            'tglakhir'                => 'required|date|after_or_equal:tglmulai',
            'jmlpenceramah'           => 'nullable|integer|min:0',
            'jmlpengajar'             => 'nullable|integer|min:0',
            'jmlpeserta'              => 'nullable|integer|min:0',
            'jmlpenerjemah'           => 'nullable|integer|min:0',
            'totalpanitia'            => 'nullable|integer|min:0',
            'idjenisprogram'          => 'required|exists:tbl_jenisprogram,idjenisprogram',
            'idnondiklat'             => 'nullable|exists:tbl_nondiklat,idnondiklat',
            'idmodakegiatan'          => 'required|exists:tbl_modakegiatan,idmodakegiatan',
            'jmlpengarah'             => 'nullable|integer|min:0',
            'jmlpenanggungjawab'      => 'nullable|integer|min:0',
            'jmlketua'                => 'nullable|integer|min:0',
            'jmlanggotapenjabakademik' => 'nullable|integer|min:0',
            'jmlanggotapanitiakelas'  => 'nullable|integer|min:0',
            'jmladmindigital'         => 'nullable|integer|min:0',
            'jmlpetugaskeuangan'      => 'nullable|integer|min:0',
            'jmlnotulen'              => 'nullable|integer|min:0',
            'jmlmoderator'            => 'nullable|integer|min:0',
            'jmlpanitialainnya'       => 'nullable|integer|min:0',
            'jmlpanitia'              => 'nullable|integer|min:0',
            'jmljamkegiatan'          => 'nullable|integer|min:0',
            'waktuperjp'              => 'nullable|integer|min:0',
            'jmlatkpanitia'           => 'nullable|integer|min:0',
            'jmlatkkegiatan'          => 'nullable|integer|min:0',
            'jmlhapd'                 => 'nullable|integer|min:0',
            'jmlperlengkapan'         => 'nullable|integer|min:0',
            'jmlkonsumsi'             => 'nullable|integer|min:0',
            'jmlsertifikat'           => 'nullable|integer|min:0',
            'jmlspanduk'              => 'nullable|integer|min:0',
            'jmlfotocopybahan'        => 'nullable|integer|min:0',
            'jmlmodul'                => 'nullable|integer|min:0',
            'pengirimanmodul'         => 'nullable|string|max:255',
            'jmlkendaraan'            => 'nullable|integer|min:0',
            'jmlaula'                 => 'nullable|integer|min:0',
            'jmlruangkelas'           => 'nullable|integer|min:0',
            'jmlorangfullboard'       => 'nullable|integer|min:0',
            'jmlkamarfullboard'       => 'nullable|integer|min:0',
            'jmlorangperkamar'        => 'nullable|integer|min:0',
            'jmlorangfullday'         => 'nullable|integer|min:0',
            'deskripsikegiatan'       => 'nullable|string',
            'tujuankegiatan'          => 'nullable|string',
            'persyaratanpeserta'      => 'nullable|string',
            'informasitahapankegiatan' => 'nullable|string',
            'idpembiayaan'            => 'required|array|min:1',
            'idpembiayaan.*'          => 'exists:tbl_pembiayaan,idpembiayaan',
            'namapenceramah'          => 'required|array|min:1',
            'namapenceramah.*'        => 'string|max:255',
            'namapengajar'            => 'required|array|min:1',
            'namapengajar.*'          => 'string|max:255',
            'namapenerjemah'          => 'nullable|array',
            'namapenerjemah.*'        => 'nullable|string|max:255',
            'idapd'                   => 'required|array|min:1',
            'idapd.*'                 => 'exists:tbl_apd,idapd',
            'idperlengkapan'          => 'required|array|min:1',
            'idperlengkapan.*'        => 'exists:tbl_perlengkapan,idperlengkapan',
            'idkonsumsi'              => 'required|array|min:1',
            'idkonsumsi.*'            => 'exists:tbl_konsumsi,idkonsumsi',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'namakegiatan.required'         => 'Nama kegiatan wajib diisi.',
            'lokasikegiatan.required'       => 'Lokasi kegiatan wajib diisi.',
            'tglmulai.required'             => 'Tanggal mulai wajib diisi.',
            'tglakhir.after_or_equal'       => 'Tanggal akhir harus sama atau setelah tanggal mulai.',
            'idjenisprogram.required'       => 'Jenis program wajib dipilih.',
            'idjenisprogram.exists'         => 'Jenis program tidak valid.',
            'idmodakegiatan.required'       => 'Moda kegiatan wajib dipilih.',
            'idmodakegiatan.exists'         => 'Moda kegiatan tidak valid.',
            'idpembiayaan.required'         => 'Sumber pembiayaan wajib dipilih.',
            'namapenceramah.required'       => 'Nama penceramah wajib diisi.',
            'namapengajar.required'         => 'Nama pengajar wajib diisi.',
        ];
    }
}
