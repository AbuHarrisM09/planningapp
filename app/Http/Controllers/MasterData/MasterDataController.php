<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class MasterDataController extends Controller
{
    protected string $modelClass;
    protected string $primaryKey;
    protected string $viewName;
    protected string $redirectPath;
    protected string $itemName;

    public function index()
    {
        $data = $this->modelClass::orderBy($this->primaryKey, 'ASC')->paginate(5);
        return view($this->viewName, [
            $this->itemName => $data
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->storeValidationRules($request));
        $this->modelClass::create($validatedData);
        return redirect($this->redirectPath)->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->updateValidationRules($request, $id));
        $model = $this->modelClass::findOrFail($id);
        $model->update($this->getUpdateData($request));
        return redirect($this->redirectPath)->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $model = $this->modelClass::findOrFail($id);
        $model->delete();
        return redirect($this->redirectPath)->with('success', 'Data berhasil dihapus.');
    }

    abstract protected function storeValidationRules(Request $request): array;
    abstract protected function updateValidationRules(Request $request, $id): array;
    abstract protected function getUpdateData(Request $request): array;
}
