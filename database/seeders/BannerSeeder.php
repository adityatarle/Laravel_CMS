<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'title' => 'Sample Banner 1',
            'description' => 'Description for banner 1',
            'image' => 'sample1.jpg' // Ensure this image exists in the public/images directory
        ]);

        Banner::create([
            'title' => 'Sample Banner 2',
            'description' => 'Description for banner 2',
            'image' => 'sample2.jpg' // Ensure this image exists in the public/images directory
        ]);

        Banner::create([
            'title' => 'Sample Banner 2',
            'description' => 'Description for banner 2',
            'image' => 'sample2.jpg' // Ensure this image exists in the public/images directory
        ]);
    }
}
