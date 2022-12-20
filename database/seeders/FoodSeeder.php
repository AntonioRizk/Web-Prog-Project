<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\foods;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foods::create([
            'restaurant_id' =>3,
            'name' => 'chicken',
            'caloriecount' => 10,
            'cuisine' => 'lebanese',
            'description' => 'aa',
            'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=989&q=80',
            'category_id' => 1,
            'price' =>10,
            'discountpercentage' => 0,
            'available' => 1, 
        ]);
    }
}
