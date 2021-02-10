<?php

namespace App\Actions;

class MultiplyMatricesAction
{
    /**
     *
     * Multiply two matrices and returns the ansewr
     *
     * @param array $matrix1
     * @param array $matrix2
     *
     * @return array
     */

    public function __invoke(array $matrix1, array $matrix2): array
    {

        $resultArray = [];

        $rowResult = count($matrix1);
        $colResult = count($matrix2[0]);
        $innerCount = count($matrix2);

        for ($i = 0; $i < $rowResult; $i++) {
            $resultArray[$i] = [];
        }

        for ($i = 0; $i < $rowResult; $i++) {
            for ($j = 0; $j < $colResult; $j++) {
                $resultArray[$i][$j] = 0;

                for ($k = 0; $k < $innerCount; $k++) {
                    $resultArray[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
                }
            }
        }

        return $resultArray;
    }
}
