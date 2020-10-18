<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use App\Models\Reply;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Like;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(10)->create();
        Category::factory()->times(5)->create();
        Question::factory()->times(10)->create();
        Reply::factory()->times(50)->create()->each(function ($reply) {
            return $reply->like()->save(Like::factory()->make());
        });
    }
}
