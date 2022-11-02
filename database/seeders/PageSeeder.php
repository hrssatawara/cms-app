<?php

namespace Database\Seeders;

use App\Models\Pages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'slug' => 'home-page',
                'title' => 'This is Home Page title.',
                'content' => 'This is home Page content.',
            ],
            [
                'slug' => 'demo-page',
                'parent_id' => 1,
                'title' => 'This is Demo Page title.',
                'content' => 'This is Demo Page content.',
            ],
            [
                'slug' => 'contact-page',
                'parent_id' => 1,
                'title' => 'This is contact Page title.',
                'content' => 'This is contact Page content.',
            ],
            [
                'slug' => 'desc-page',
                'parent_id' => 3,
                'title' => 'This is Desc Page title.',
                'content' => 'This is Desc Page content.',
            ],
            [
                'slug' => 'profile-page',
                'title' => 'This is Profile Page title.',
                'content' => 'This is Profile Page content.',
            ],
        ];

        foreach ($pages as $page) {
            Pages::create($page);
        }
    }
}
