<?php

namespace App\Http\Controllers\MasterData;

use App\Models\Apd;
use Illuminate\Http\Request;

class ApdController extends MasterDataController
{
    protected string $modelClass = Apd::class;
    protected string $primaryKey = 'idapd';
    protected string $viewName = 'superadmin.apd';
    protected string $redirectPath = '/apd';
    protected string $itemName = 'apd';

    protected function storeValidationRules(Request $request): array
    {
        return [
            'namaapd' => 'required|unique:tbl_apd,namaapd'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'namaapd' => 'required|unique:tbl_apd,namaapd,' . $id . ',idapd'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'namaapd' => $request->namaapd
        ];
    }
}
