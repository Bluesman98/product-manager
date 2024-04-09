<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v8;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

       $categories =  Category::factory(3)->create([
            'user_id' => $user->id
        ]);

        Product::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $user->categories[0]->id
        ]);

          Product::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $user->categories[1]->id
        ]);

        Product::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $user->categories[2]->id
        ]);  
        
    }
}
