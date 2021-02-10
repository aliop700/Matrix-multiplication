<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Matrix2DOnly implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $valid = true;

        foreach ($value as $row) {
            if (!is_array($row)) {
                break;
            }

            foreach ($row as $item) {
                if (is_array($item)) {
                    $valid = false;
                    break;
                }
            }
        }

        return $valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute matrix is not 2D';
    }
}
