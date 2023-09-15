<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Promocode;

class PromocodeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_promocode()
    {
        $promocode = Promocode::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/promocodes', $promocode
        );

        $this->assertApiResponse($promocode);
    }

    /**
     * @test
     */
    public function test_read_promocode()
    {
        $promocode = Promocode::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/promocodes/'.$promocode->id
        );

        $this->assertApiResponse($promocode->toArray());
    }

    /**
     * @test
     */
    public function test_update_promocode()
    {
        $promocode = Promocode::factory()->create();
        $editedPromocode = Promocode::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/promocodes/'.$promocode->id,
            $editedPromocode
        );

        $this->assertApiResponse($editedPromocode);
    }

    /**
     * @test
     */
    public function test_delete_promocode()
    {
        $promocode = Promocode::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/promocodes/'.$promocode->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/promocodes/'.$promocode->id
        );

        $this->response->assertStatus(404);
    }
}
