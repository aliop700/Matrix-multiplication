<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MatrixApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function guest_cant_multiply_matrices()
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/matrix/multiply');

        $response->assertStatus(401);
    }

    /** @test */
    public function user_can_multiply_matrices()
    {
        $matrix1 = [[1]];
        $matrix2 = [[2]];

        Sanctum::actingAs(
            factory(User::class)->create()
        );

        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/matrix/multiply', ['matrix1' => $matrix1, 'matrix2' => $matrix2]);

        $response->assertStatus(200);
    }

    /** @test */
    public function empty_matrix_not_accepted()
    {
        $matrix1 = [];
        $matrix2 = [];

        Sanctum::actingAs(
            factory(User::class)->create()
        );

        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/matrix/multiply', ['matrix1' => $matrix1, 'matrix2' => $matrix2]);

        $response->assertSee('false');
        $response->assertStatus(422);

    }

    /** @test */
    public function unmultpliable_matrices_not_accepted()
    {
        $matrix1 = [[0, 1, 2]];
        $matrix2 = [[0, 1]];

        Sanctum::actingAs(
            factory(User::class)->create()
        );

        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/matrix/multiply', ['matrix1' => $matrix1, 'matrix2' => $matrix2]);

        $response->assertSee('false');
        $response->assertStatus(422);

    }

    /** @test */
    public function chars_not_accepted_in_values()
    {
        $matrix1 = [[0, 'a', 2]];
        $matrix2 = [[0, 'b']];

        Sanctum::actingAs(
            factory(User::class)->create()
        );

        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/matrix/multiply', ['matrix1' => $matrix1, 'matrix2' => $matrix2]);

        $response->assertSee('false');
        $response->assertStatus(422);

    }

    /** @test */
    public function not_2d_matrices_not_accepted()
    {
        $matrix1 = [[0, 'a', [1, 2]]];
        $matrix2 = [[0, 'b']];

        Sanctum::actingAs(
            factory(User::class)->create()
        );

        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/matrix/multiply', ['matrix1' => $matrix1, 'matrix2' => $matrix2]);

        $response->assertSee('false');
        $response->assertStatus(422);

    }

}
