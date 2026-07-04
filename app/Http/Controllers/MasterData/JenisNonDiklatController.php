<?php

namespace App\Http\Controllers\MasterData;

use App\Models\JenisNonDiklat;
use App\Models\JenisProgram;
use Illuminate\Http\Request;

class JenisNonDiklatController extends MasterDataController
{
    protected string $modelClass = JenisNonDiklat::class;
    protected string $primaryKey = 'idnondiklat';
    protected string $viewName = 'superadmin.nondiklat';
    protected string $redirectPath = '/jen-keg-non-diklat';
    protected string $itemName = 'nondik';

    public function index()
    {
        $nd = JenisNonDiklat::orderBy('idnondiklat', 'DESC')->paginate(5);
        $jp = JenisProgram::where('idjenisprogram', 1)->get();

        return view($this->viewName, [
            'nondik' => $nd,
            'opjenprog' => $jp
        ]);
    }

    protected function storeValidationRules(Request $request): array
    {
        return [
            'idjenisprogram' => 'required|exists:tbl_jenisprogram,idjenisprogram',
            'namadiklat'     => 'required|unique:tbl_nondiklat,namadiklat'
        ];
    }

    protected function updateValidationRules(Request $request, $id): array
    {
        return [
            'namadiklat' => 'required|unique:tbl_nondiklat,namadiklat,' . $id . ',idnondiklat'
        ];
    }

    protected function getUpdateData(Request $request): array
    {
        return [
            'namadiklat' => $request->namadiklat
        ];
    }
}
