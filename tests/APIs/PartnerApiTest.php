<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Partner;

class PartnerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_partner()
    {
        $partner = Partner::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/partners', $partner
        );

        $this->assertApiResponse($partner);
    }

    /**
     * @test
     */
    public function test_read_partner()
    {
        $partner = Partner::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/partners/'.$partner->id
        );

        $this->assertApiResponse($partner->toArray());
    }

    /**
     * @test
     */
    public function test_update_partner()
    {
        $partner = Partner::factory()->create();
        $editedPartner = Partner::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/partners/'.$partner->id,
            $editedPartner
        );

        $this->assertApiResponse($editedPartner);
    }

    /**
     * @test
     */
    public function test_delete_partner()
    {
        $partner = Partner::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/partners/'.$partner->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/partners/'.$partner->id
        );

        $this->response->assertStatus(404);
    }
}
