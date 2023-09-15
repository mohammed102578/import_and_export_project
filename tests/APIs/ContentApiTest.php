<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Content;

class ContentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_content()
    {
        $content = Content::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contents', $content
        );

        $this->assertApiResponse($content);
    }

    /**
     * @test
     */
    public function test_read_content()
    {
        $content = Content::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/contents/'.$content->id
        );

        $this->assertApiResponse($content->toArray());
    }

    /**
     * @test
     */
    public function test_update_content()
    {
        $content = Content::factory()->create();
        $editedContent = Content::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contents/'.$content->id,
            $editedContent
        );

        $this->assertApiResponse($editedContent);
    }

    /**
     * @test
     */
    public function test_delete_content()
    {
        $content = Content::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contents/'.$content->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contents/'.$content->id
        );

        $this->response->assertStatus(404);
    }
}
