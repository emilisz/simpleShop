<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{

     // use RefreshDatabase;

   
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

  
   public function test_guest_can_not_create_product()
   {
     {
                $data = [
                        'name'=> 'Boots',
                        'sku' => '20202020',
                        'description'=> 'bla bla bla',
                        'price' => '50',
                        'special_price'=> '49',
                        'status'=> 1
                               ];

            $response = $this->json('POST', '/products',$data);
            $response->assertStatus(401);
            $response->assertJson(['message' => "Unauthenticated."]);
        }
   }

   public function test_can_create_product()
   {
    
        $this->actingAs(factory('App\User')->create());

        $this->post('/products',[
            'name'=> 'Boots',
            'sku' => '20202020',
            'description'=> 'bla bla bla',
            'price' => '50',
            'special_price'=> '49',
            'status'=> 1
        ]);
    
        $this->assertDatabaseHas('products', ['name' => 'Boots']);
   }

}
