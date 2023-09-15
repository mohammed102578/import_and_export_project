<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PublicQuestion;

class PublicQuestionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/public_questions', $publicQuestion
        );

        $this->assertApiResponse($publicQuestion);
    }

    /**
     * @test
     */
    public function test_read_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/public_questions/'.$publicQuestion->id
        );

        $this->assertApiResponse($publicQuestion->toArray());
    }

    /**
     * @test
     */
    public function test_update_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->create();
        $editedPublicQuestion = PublicQuestion::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/public_questions/'.$publicQuestion->id,
            $editedPublicQuestion
        );

        $this->assertApiResponse($editedPublicQuestion);
    }

    /**
     * @test
     */
    public function test_delete_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/public_questions/'.$publicQuestion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/public_questions/'.$publicQuestion->id
        );

        $this->response->assertStatus(404);
    }
}
