<?php

namespace App\Http\Controllers\MasterData;

use App\Models\Pembiayaan;
use Illuminate\Http\Request;

class PembiayaanController extends MasterDataController
{
    protected string $modelClass = Pembiayaan::class;
    protected string $primaryKey = 'idpembiayaan';
    protected string $viewName = 'superadmin.pembiayaan';
    protected string $redirectPath = '/jenis-pembiayaan';
    protected string $itemName = 'biaya';

    protected function storeValidationRules(Request $request): array
    {
        return [
            'jenispembiayaan' => 'required|unique:tbl_pembiayaan,jenispembiayaan'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'jenispembiayaan' => 'required|unique:tbl_pembiayaan,jenispembiayaan,' . $id . ',idpembiayaan'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'jenispembiayaan' => $request->jenispembiayaan
        ];
    }
}
