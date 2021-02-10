<?php

namespace Support;

class Arrays
{
    /**
     *
     * check if the arrays are equal
     *
     * @param array $array1
     * @param array $array2
     *
     * @return bool
     *
     */

    public static function areEqual(array $array1, array $array2): bool
    {

        foreach ($array1 as $key => $value) {
            if ($value != $array2[$key]) {
                return false;
            }
        }

        return true;
    }
}
