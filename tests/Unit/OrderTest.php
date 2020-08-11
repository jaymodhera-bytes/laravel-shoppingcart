<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;

class OrderTest extends TestCase
{
    public function testPlaceBlockedCountryOrder() {
        // by pass csrf token for test case
        $this->withoutMiddleware(); 
        $product   = DB::table('products')->where('id', '>', 0)->first();
        $productId = $product->id;

        // prepare the dummy cart data    
        $cartData  = array(
            'cart' => array(
                $productId => array(
                    "name"     => $product->name,
                    "quantity" => 1,
                    "price"    => $product->price,
                    "photo"    => $product->photo
                )
            )
        );
        
        // prepare dummy order shipping data
        $orderData = array(
            'email'             => 'test.user@example.com',
            'shopping_address1' => 'Lorem Ipsum Address 1',
            'shopping_address2' => 'Lorem Ipsum Address 2',
            'shopping_address3' => 'Lorem Ipsum Address 3',
            'city'              => 'test_city', // sample city, dont change this value
            'country_code'      => 'SO',
            'zip_postal_code'   => '111111', // sample code, dont change this value
            'isTesting'         => true,
            'testCountry'       => 'SO'
        );

        $response = $this->withSession($cartData)->post('/checkout/order', $orderData);
        $this->assertEquals(302, $response->status());
    }

    public function testPlaceValidOrder() {
        // by pass csrf token for test case
        $this->withoutMiddleware(); 
        $product   = DB::table('products')->where('id', '>', 0)->first();
        $productId = $product->id;

        // prepare the dummy cart data    
        $cartData  = array(
            'cart' => array(
                $productId => array(
                    "name"     => $product->name,
                    "quantity" => 1,
                    "price"    => $product->price,
                    "photo"    => $product->photo
                )
            )
        );

        // prepare dummy order shipping data
        $orderData = array(
            'email'             => 'test.user@example.com',
            'shopping_address1' => 'Lorem Ipsum Address 1',
            'shopping_address2' => 'Lorem Ipsum Address 2',
            'shopping_address3' => 'Lorem Ipsum Address 3',
            'city'              => 'test_city', // sample city, dont change this value
            'country_code'      => 'SO',
            'zip_postal_code'   => '111111', // sample code, dont change this value
        );
        
        $response = $this->withSession($cartData)->post('/checkout/order', $orderData);
        $this->assertEquals(302, $response->status());

        // check if the record inserted in orders table    
        $this->assertDatabaseHas('orders', [
            'city'            => 'test_city',
            'zip_postal_code' => '111111'
        ]);
        
        // get the inserted order id value
        $insertedOrder = DB::table('orders')
            ->where('city', 'test_city')
            ->where('zip_postal_code', '111111')
            ->orderBy('id','DESC')
            ->first();
        $orderId = $insertedOrder->id;        

        // check if the record inserted in order_items table    
        $this->assertDatabaseHas('order_items', ['id' => $orderId]);    

        // delete the sample record from table
        $orderItemRecord = DB::table('order_items')
            ->where('order_id', $orderId)
            ->delete();

        // delete the sample record from table
        $orderRecord = DB::table('orders')
            ->where('city', 'test_city')
            ->where('zip_postal_code', '111111')
            ->delete();
    }
}
