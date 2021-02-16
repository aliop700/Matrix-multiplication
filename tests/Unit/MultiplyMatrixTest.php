<?php

namespace Tests\Unit;

use App\Actions\MultiplyMatricesAction;
use PHPUnit\Framework\TestCase;
use Support\Arrays;
use Support\NumConverter;

class MultiplyMatrixTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */

    protected function setUp(): void
    {
        parent::setUp();
        // your code goes here
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // your code goes here
    }

    public function number_converter_test()
    {
        $nums = [
            '1' => 'A',
            '2' => 'B',
            '27' => 'AA',
            '28' => 'AB',
            '29' => 'AC'
        ];

        dump(NumConverter::convert(1));
        foreach ($nums as $key => $value) {
            $this->assertEquals($value, NumConverter::convert($key));
        }
    }

    /** @test */
    public function multiply_matrices_test()
    {
        $matrix1 = [
            [1, 2, 3],
            [4, 5, 6]
        ];

        $matrix2 = [
            [1, 2],
            [3, 4],
            [5, 6]
        ];

        $expectedResult = [
            [22, 28],
            [49, 64]
        ];

        $actualResult = (new MultiplyMatricesAction())($matrix1, $matrix2);

        $this->assertTrue(Arrays::areEqual($expectedResult, $actualResult));

    }

}
