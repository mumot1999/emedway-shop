<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        foreach (range(1, 20) as $i) {
            factory(Item::class)->create([
                'name' => 'zeszyt'.$i,
                'price' => 5*100,
                'amount' => 10,
            ]);
        }
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_see_4_items_in_main_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        foreach (range(1,4) as $i) {
            $response->assertSee('zeszyt'.$i);
        }
    }
}
