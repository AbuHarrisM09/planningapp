<?php

namespace App\Http\Controllers\MasterData;

use App\Models\Perlengkapan;
use Illuminate\Http\Request;

class PerlengkapanController extends MasterDataController
{
    protected string $modelClass = Perlengkapan::class;
    protected string $primaryKey = 'idperlengkapan';
    protected string $viewName = 'superadmin.perlengkapan';
    protected string $redirectPath = '/jenis-perlengkapan';
    protected string $itemName = 'perlengkapan';

    protected function storeValidationRules(Request $request): array
    {
        return [
            'namaperlengkapan' => 'required|unique:tbl_perlengkapan,namaperlengkapan'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'namaperlengkapan' => 'required|unique:tbl_perlengkapan,namaperlengkapan,' . $id . ',idperlengkapan'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'namaperlengkapan' => $request->namaperlengkapan
        ];
    }
}
