<?php namespace Tests\Repositories;

use App\Models\Content;
use App\Repositories\ContentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContentRepository
     */
    protected $contentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contentRepo = \App::make(ContentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_content()
    {
        $content = Content::factory()->make()->toArray();

        $createdContent = $this->contentRepo->create($content);

        $createdContent = $createdContent->toArray();
        $this->assertArrayHasKey('id', $createdContent);
        $this->assertNotNull($createdContent['id'], 'Created Content must have id specified');
        $this->assertNotNull(Content::find($createdContent['id']), 'Content with given id must be in DB');
        $this->assertModelData($content, $createdContent);
    }

    /**
     * @test read
     */
    public function test_read_content()
    {
        $content = Content::factory()->create();

        $dbContent = $this->contentRepo->find($content->id);

        $dbContent = $dbContent->toArray();
        $this->assertModelData($content->toArray(), $dbContent);
    }

    /**
     * @test update
     */
    public function test_update_content()
    {
        $content = Content::factory()->create();
        $fakeContent = Content::factory()->make()->toArray();

        $updatedContent = $this->contentRepo->update($fakeContent, $content->id);

        $this->assertModelData($fakeContent, $updatedContent->toArray());
        $dbContent = $this->contentRepo->find($content->id);
        $this->assertModelData($fakeContent, $dbContent->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_content()
    {
        $content = Content::factory()->create();

        $resp = $this->contentRepo->delete($content->id);

        $this->assertTrue($resp);
        $this->assertNull(Content::find($content->id), 'Content should not exist in DB');
    }
}
