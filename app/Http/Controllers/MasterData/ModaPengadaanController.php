<?php

namespace App\Http\Controllers\MasterData;

use App\Models\ModaPengadaan;
use Illuminate\Http\Request;

class ModaPengadaanController extends MasterDataController
{
    protected string $modelClass = ModaPengadaan::class;
    protected string $primaryKey = 'idmodapengadaan';
    protected string $viewName = 'superadmin.modapengadaan';
    protected string $redirectPath = '/jenis-pengadaan';
    protected string $itemName = 'pengadaan';

    protected function storeValidationRules(Request $request): array
    {
        return [
            'jenismodapengadaan' => 'required|unique:tbl_modapengadaan,jenismodapengadaan'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'jenismodapengadaan' => 'required|unique:tbl_modapengadaan,jenismodapengadaan,' . $id . ',idmodapengadaan'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'jenismodapengadaan' => $request->jenismodapengadaan
        ];
    }
}
