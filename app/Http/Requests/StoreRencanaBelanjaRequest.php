<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRencanaBelanjaRequest extends FormRequest
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
            'namaprogram'               => 'required|string|max:255',
            'namalembaga'               => 'required|string|max:255',
            'namamitra'                 => 'nullable|string|max:255',
            'lokasi'                    => 'required|string|max:255',
            'tglmulaibb'                => 'required|date',
            'tglakhirbb'                => 'required|date|after_or_equal:tglmulaibb',
            'jmlketua'                  => 'nullable|integer|min:0',
            'jmlsekretaris'             => 'nullable|integer|min:0',
            'jmlanggota'                => 'nullable|integer|min:0',
            'jmlpetugaskeuangan'        => 'nullable|integer|min:0',
            'deskripsiprogrambb'        => 'nullable|string',
            'tujuanprogrambb'           => 'nullable|string',
            'persyaratanvendorbb'       => 'nullable|string',
            'informasitahapanprogrambb'  => 'nullable|string',
            'idjenisbarang'             => 'required|exists:tbl_jenisbarang,idjenisbarang',
            'idjenisbelanjainventaris'  => 'nullable|exists:tbl_barang_inventaris,idbaranginventaris',
            'idmodapengadaan'           => 'required|exists:tbl_modapengadaan,idmodapengadaan',
            'idpembiayaan'              => 'required|array|min:1',
            'idpembiayaan.*'            => 'exists:tbl_pembiayaan,idpembiayaan',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'namaprogram.required'               => 'Nama program wajib diisi.',
            'namalembaga.required'               => 'Nama lembaga wajib diisi.',
            'lokasi.required'                    => 'Lokasi wajib diisi.',
            'tglmulaibb.required'                => 'Tanggal mulai wajib diisi.',
            'tglakhirbb.after_or_equal'          => 'Tanggal akhir harus sama atau setelah tanggal mulai.',
            'idjenisbarang.required'             => 'Jenis barang wajib dipilih.',
            'idjenisbarang.exists'               => 'Jenis barang tidak valid.',
            'idmodapengadaan.required'           => 'Moda pengadaan wajib dipilih.',
            'idmodapengadaan.exists'             => 'Moda pengadaan tidak valid.',
            'idpembiayaan.required'              => 'Sumber pembiayaan wajib dipilih.',
        ];
    }
}
