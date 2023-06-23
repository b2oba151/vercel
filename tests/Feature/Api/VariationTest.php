<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Variation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VariationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_variations_list(): void
    {
        $variations = Variation::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.variations.index'));

        $response->assertOk()->assertSee($variations[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_variation(): void
    {
        $data = Variation::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.variations.store'), $data);

        $this->assertDatabaseHas('variations', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_variation(): void
    {
        $variation = Variation::factory()->create();

        $data = [
            'avant' => $this->faker->randomNumber(1),
            'apres' => $this->faker->randomNumber(1),
            'variation' => $this->faker->randomNumber(1),
        ];

        $response = $this->putJson(
            route('api.variations.update', $variation),
            $data
        );

        $data['id'] = $variation->id;

        $this->assertDatabaseHas('variations', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_variation(): void
    {
        $variation = Variation::factory()->create();

        $response = $this->deleteJson(
            route('api.variations.destroy', $variation)
        );

        $this->assertModelMissing($variation);

        $response->assertNoContent();
    }
}
