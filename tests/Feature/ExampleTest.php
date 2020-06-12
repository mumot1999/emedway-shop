<?php

namespace Tests\Feature;

use App\Item;
use App\Mail\CheckoutMail;
use Illuminate\Support\Facades\Mail;
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
        $response->assertDontSee('zeszyt5');
    }

    public function test_checkout()
    {
        Mail::fake();
        $this->followingRedirects();
        $this->post('/checkout', [
            'name' => 'Name',
            'street' => 'street',
            'nip' => 'nip',
            'postcode' => '00-000',
            'email' => 'email@email.com',
            'phone' => '123540327',
            'items' => [
                '0' => '5'
            ]
        ])
            ->assertSee('Checkout success')
        ;

        $this->assertEquals(9, Item::find(5)->amount);
        Mail::assertSent(CheckoutMail::class, 1);
    }
}
