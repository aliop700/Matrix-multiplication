<?php

namespace Support;

class NumConverter
{
    /**
     *
     * Converts number to coresponding characters
     *
     * @param int $num
     *
     * @return string
     *
     */

    public static function convert(int $num): string
    {

        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        if ($num <= 26) {
            return $alphabet[$num - 1];
        } else {
            return self::convert(intdiv($num, 26)) . $alphabet[$num % 26 - 1];
        }

    }
}
