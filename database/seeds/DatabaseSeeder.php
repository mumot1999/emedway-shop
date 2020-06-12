<?php

use App\Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 20) as $i) {
            factory(Item::class)->create([
                'name' => 'product'.$i,
                'price' => 5*100,
                'amount' => 10,
            ]);
        }
    }
}
