<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Variation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VariationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_variations(): void
    {
        $variations = Variation::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('variations.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.variations.index')
            ->assertViewHas('variations');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_variation(): void
    {
        $response = $this->get(route('variations.create'));

        $response->assertOk()->assertViewIs('app.variations.create');
    }

    /**
     * @test
     */
    public function it_stores_the_variation(): void
    {
        $data = Variation::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('variations.store'), $data);

        $this->assertDatabaseHas('variations', $data);

        $variation = Variation::latest('id')->first();

        $response->assertRedirect(route('variations.edit', $variation));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_variation(): void
    {
        $variation = Variation::factory()->create();

        $response = $this->get(route('variations.show', $variation));

        $response
            ->assertOk()
            ->assertViewIs('app.variations.show')
            ->assertViewHas('variation');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_variation(): void
    {
        $variation = Variation::factory()->create();

        $response = $this->get(route('variations.edit', $variation));

        $response
            ->assertOk()
            ->assertViewIs('app.variations.edit')
            ->assertViewHas('variation');
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

        $response = $this->put(route('variations.update', $variation), $data);

        $data['id'] = $variation->id;

        $this->assertDatabaseHas('variations', $data);

        $response->assertRedirect(route('variations.edit', $variation));
    }

    /**
     * @test
     */
    public function it_deletes_the_variation(): void
    {
        $variation = Variation::factory()->create();

        $response = $this->delete(route('variations.destroy', $variation));

        $response->assertRedirect(route('variations.index'));

        $this->assertModelMissing($variation);
    }
}
