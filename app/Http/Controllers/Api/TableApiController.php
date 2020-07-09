<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\tenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function tablesByTenant(tenantFormRequest $request)
    {
        // if ($request->token_company){
        //     return response()->json(['message' => 'Token not Found'],404);
        // }
        $tables = $this->tableService->getTablesByUuid($request->token_company);

        return TableResource::collection($tables);
    }

    public function show(tenantFormRequest $request, $identify)
    {
        if (!$table = $this->tableService->getTableByUuid($identify)){
            return response()->json(['message' => 'Table not Found'],404);
        }
        return new TableResource($table);
    }
}
