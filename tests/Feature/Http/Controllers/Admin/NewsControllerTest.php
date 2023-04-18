<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndexSuuccessStatus(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $data = [
            'title'=> \fake()->jobTitle(),
            'author' => \fake()->userName(),
            'description' => \fake()->text(100)
        ];

        $response = $this->post(route('admin.news.store'), $data);

        $response->assertStatus(200)
            ->json($data);
    }

    public function testValidateTitleData(): void
    {
        $data = [
            'author' => \fake()->userName(),
            'description' => \fake()->text(100)
        ];

        $response = $this->post(route('admin.news.store'), $data);
        $response->assertRedirect('http://localhost');
    }
}
