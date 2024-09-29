<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        //App\Models\Tag::factory()->create(4);
        $menuItems = ['Новости', 'Видео', 'Виды уток', 'История уток'];
        $tags = ['Премьера', 'Объявление', 'Новая серия', 'Событие'];
        foreach ($menuItems as $index => $item) {
            \App\Models\MenuItem::create([
                'title' => $item,
                'sort'  => $index,
                'status'=> true
            ]);
        }
        foreach ($tags as $tag) {
            \App\Models\Tag::factory()->create([
                'title' => $tag
            ]);
        }

        $videoTags = \App\Models\Tag::whereIn('title', ['Новая серия', 'Премьера'])->get();
        $newsTags = \App\Models\Tag::whereIn('title', ['Объявление', 'Событие'])->get();
        

        \App\Models\News::factory()
            ->count(6)
            ->hasAttached($newsTags)
            ->create();


        \App\Models\Video::factory()
            ->count(8)
            ->hasAttached($videoTags)
            ->create();
        
    }
}
