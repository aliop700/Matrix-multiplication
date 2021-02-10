<?php

namespace App\Http\Requests;

use App\Rules\Matrix2DOnly;
use App\Rules\MatrixContainsOnlyNumbers;
use App\Rules\MatrixesMultipliable;
use App\Rules\MatrixNotEmpty;
use App\Rules\ValidMatrix;

class MultiplyMatrixRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matrix1' => ['bail', 'required', 'array', new MatrixNotEmpty(), new ValidMatrix(), new Matrix2DOnly(), new MatrixContainsOnlyNumbers(), new MatrixesMultipliable($this)],
            'matrix2' => ['bail', 'required', 'array', new MatrixNotEmpty(), new ValidMatrix(), new Matrix2DOnly(), new MatrixContainsOnlyNumbers()]
        ];
    }

}
