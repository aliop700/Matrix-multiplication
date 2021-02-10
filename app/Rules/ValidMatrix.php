<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidMatrix implements Rule
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
        $mainRowWidth = null;

        $valid = true;

        foreach ($value as $row) {
            if (!is_array($row)) {
                $valid = false;
                break;
            }

            if (!$mainRowWidth) {
                $mainRowWidth = count($row);
                continue;
            }

            if (count($row) != $mainRowWidth) {
                $valid = false;
                break;
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
        return ':attribute is not a valid matrix';
    }
}
