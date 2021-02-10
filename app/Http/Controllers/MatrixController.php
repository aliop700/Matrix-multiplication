<?php

namespace App\Http\Controllers;

use App\Actions\MultiplyMatricesAction;
use App\Http\Requests\MultiplyMatrixRequest;

class MatrixController extends Controller
{
    /**
     *
     * takes two matrices and multiply them
     *
     * @param MultiplyMatrixRequest $request
     *
     * @return Illuminate\Support\Facades\Response
     *
     */

    public function multiply(MultiplyMatrixRequest $request)
    {

        $result = (new MultiplyMatricesAction())($request->input('matrix1'), $request->input('matrix2'));

        $mappedResult = collect($result)->mapValuesToChars()->toArray();

        return response()->success($mappedResult);
    }
}
