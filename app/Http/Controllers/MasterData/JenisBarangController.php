<?php

namespace App\Http\Controllers\MasterData;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends MasterDataController
{
    protected string $modelClass = JenisBarang::class;
    protected string $primaryKey = 'idjenisbarang';
    protected string $viewName = 'superadmin.jenbar';
    protected string $redirectPath = '/jenis-barang';
    protected string $itemName = 'barang';

    protected function storeValidationRules(Request $request): array
    {
        return [
            'jenisbarang' => 'required|unique:tbl_jenisbarang,jenisbarang'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'jenisbarang' => 'required|unique:tbl_jenisbarang,jenisbarang,' . $id . ',idjenisbarang'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'jenisbarang' => $request->jenisbarang
        ];
    }
}
