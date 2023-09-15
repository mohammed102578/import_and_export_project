<?php namespace Tests\Repositories;

use App\Models\Promocode;
use App\Repositories\PromocodeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PromocodeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PromocodeRepository
     */
    protected $promocodeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->promocodeRepo = \App::make(PromocodeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_promocode()
    {
        $promocode = Promocode::factory()->make()->toArray();

        $createdPromocode = $this->promocodeRepo->create($promocode);

        $createdPromocode = $createdPromocode->toArray();
        $this->assertArrayHasKey('id', $createdPromocode);
        $this->assertNotNull($createdPromocode['id'], 'Created Promocode must have id specified');
        $this->assertNotNull(Promocode::find($createdPromocode['id']), 'Promocode with given id must be in DB');
        $this->assertModelData($promocode, $createdPromocode);
    }

    /**
     * @test read
     */
    public function test_read_promocode()
    {
        $promocode = Promocode::factory()->create();

        $dbPromocode = $this->promocodeRepo->find($promocode->id);

        $dbPromocode = $dbPromocode->toArray();
        $this->assertModelData($promocode->toArray(), $dbPromocode);
    }

    /**
     * @test update
     */
    public function test_update_promocode()
    {
        $promocode = Promocode::factory()->create();
        $fakePromocode = Promocode::factory()->make()->toArray();

        $updatedPromocode = $this->promocodeRepo->update($fakePromocode, $promocode->id);

        $this->assertModelData($fakePromocode, $updatedPromocode->toArray());
        $dbPromocode = $this->promocodeRepo->find($promocode->id);
        $this->assertModelData($fakePromocode, $dbPromocode->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_promocode()
    {
        $promocode = Promocode::factory()->create();

        $resp = $this->promocodeRepo->delete($promocode->id);

        $this->assertTrue($resp);
        $this->assertNull(Promocode::find($promocode->id), 'Promocode should not exist in DB');
    }
}
