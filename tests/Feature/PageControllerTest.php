<?php

namespace Tests\Feature;

use App\Models\Pages;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 *
 */
class PageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        Pages::factory()->create([
            'slug' => 'test-page',
            'title' => 'Test Page',
            'content' => 'Test Page Description.'
        ]);
        $this->getJson('pages')
            ->assertOk();
    }

    /**
     * @return void
     */
    public function testRequiredFieldsForStorePage()
    {
        $this->postJson(route('pages.store'), [
            'title' => 'Test Page',
            'content' => 'Test Page Description.'
        ])
            ->assertStatus(422);
    }

    /**
     * @return void
     */
    public function testUniqueSlugForPage()
    {
        Pages::factory()->create([
            'slug' => 'test-page',
            'title' => 'Test Page',
            'content' => 'Test Page Description.'
        ]);
        $this->postJson(route('pages.store'), [
            'slug' => 'test-page',
            'title' => 'Test Page',
            'content' => 'Test Page Description.'
        ])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The slug has already been taken.",
                "errors" => [
                    "slug" => ["The slug has already been taken."]
                ]
            ]);

    }

    /**
     * @return void
     */
    public function testDelete()
    {
        $page1 = Pages::factory()->create();
        $page2 = Pages::factory()->create();

        $this->assertDatabaseHas('pages', ['id' => $page1->id]);
        $this->assertDatabaseHas('pages', ['id' => $page2->id]);

        $this->deleteJson(route('pages.destroy', $page1))
            ->assertSuccessful();
        $this->assertDatabaseMissing('pages', ['id' => $page1->id]);
        $this->assertDatabaseHas('pages', ['id' => $page2->id]);
    }
}
