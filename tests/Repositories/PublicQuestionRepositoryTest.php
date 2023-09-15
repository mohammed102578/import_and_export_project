<?php namespace Tests\Repositories;

use App\Models\PublicQuestion;
use App\Repositories\PublicQuestionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PublicQuestionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PublicQuestionRepository
     */
    protected $publicQuestionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->publicQuestionRepo = \App::make(PublicQuestionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->make()->toArray();

        $createdPublicQuestion = $this->publicQuestionRepo->create($publicQuestion);

        $createdPublicQuestion = $createdPublicQuestion->toArray();
        $this->assertArrayHasKey('id', $createdPublicQuestion);
        $this->assertNotNull($createdPublicQuestion['id'], 'Created PublicQuestion must have id specified');
        $this->assertNotNull(PublicQuestion::find($createdPublicQuestion['id']), 'PublicQuestion with given id must be in DB');
        $this->assertModelData($publicQuestion, $createdPublicQuestion);
    }

    /**
     * @test read
     */
    public function test_read_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->create();

        $dbPublicQuestion = $this->publicQuestionRepo->find($publicQuestion->id);

        $dbPublicQuestion = $dbPublicQuestion->toArray();
        $this->assertModelData($publicQuestion->toArray(), $dbPublicQuestion);
    }

    /**
     * @test update
     */
    public function test_update_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->create();
        $fakePublicQuestion = PublicQuestion::factory()->make()->toArray();

        $updatedPublicQuestion = $this->publicQuestionRepo->update($fakePublicQuestion, $publicQuestion->id);

        $this->assertModelData($fakePublicQuestion, $updatedPublicQuestion->toArray());
        $dbPublicQuestion = $this->publicQuestionRepo->find($publicQuestion->id);
        $this->assertModelData($fakePublicQuestion, $dbPublicQuestion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_public_question()
    {
        $publicQuestion = PublicQuestion::factory()->create();

        $resp = $this->publicQuestionRepo->delete($publicQuestion->id);

        $this->assertTrue($resp);
        $this->assertNull(PublicQuestion::find($publicQuestion->id), 'PublicQuestion should not exist in DB');
    }
}
