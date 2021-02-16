<?php

namespace Support;

use Aliop700\Converter\Facades\Handler;

class NumConverter
{
    /**
     *
     * Converts number to coresponding characters
     *    
     * @return string
     *
     */

    public static function convert($num): string
    {
        return Handler::handle($num);
    }
}
