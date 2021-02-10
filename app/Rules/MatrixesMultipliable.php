<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MatrixesMultipliable implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!$this->request->has('matrix2')) {
            return true;
        }

        $matrix2 = $this->request->input('matrix2');

        return count($value[0]) == count($matrix2);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return ':attribute is not multipliable with matrix2';
    }
}
