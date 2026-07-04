<?php

namespace App\Http\Controllers\MasterData;

use App\Models\BarangInventaris;
use Illuminate\Http\Request;

class BarangInventarisController extends MasterDataController
{
    protected string $modelClass = BarangInventaris::class;
    protected string $primaryKey = 'idjenisbelanjainventaris';
    protected string $viewName = 'superadmin.belanja_inventaris';
    protected string $redirectPath = '/jenis-belanja-inventaris';
    protected string $itemName = 'belanja';

    protected function storeValidationRules(Request $request): array
    {
        return [
            'namajenisbelanjainventaris' => 'required|unique:tbl_jenisbelanjainventaris,namajenisbelanjainventaris'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'namajenisbelanjainventaris' => 'required|unique:tbl_jenisbelanjainventaris,namajenisbelanjainventaris,' . $id . ',idjenisbelanjainventaris'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'namajenisbelanjainventaris' => $request->namajenisbelanjainventaris
        ];
    }
}
