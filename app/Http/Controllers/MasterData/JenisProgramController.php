<?php

namespace App\Http\Controllers\MasterData;

use App\Models\JenisProgram;
use Illuminate\Http\Request;

class JenisProgramController extends MasterDataController
{
    protected string $modelClass = JenisProgram::class;
    protected string $primaryKey = 'idjenisprogram';
    protected string $viewName = 'superadmin.jenprog';
    protected string $redirectPath = '/jenis-program';
    protected string $itemName = 'jenprog';

    protected function storeValidationRules(Request $request): array
    {
        return [
            'jenisprogram' => 'required|unique:tbl_jenisprogram,jenisprogram'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'jenisprogram' => 'required|unique:tbl_jenisprogram,jenisprogram,' . $id . ',idjenisprogram'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'jenisprogram' => $request->jenisprogram
        ];
    }
}
