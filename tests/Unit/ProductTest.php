<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;

class ProductTest extends TestCase
{
    public function testGettingAllProducts() {
        $res = $this->call('GET', '/');
        $res->assertViewHas('products');
        $productsOnView = $res->original['products'];
        $res->assertViewHas('products', $productsOnView);
    }

    public function testAddInvalidProductInCart() {
        $response = $this->call('get', '/add-to-cart/999999');
        $this->assertEquals(404, $response->status());
    }

    public function testAddToCart() {
        $product   = DB::table('products')->where('id', '>', 0)->first();
        $productId = $product->id;
        $response  = $this->withSession(array('cart' => array('id' => $productId)))
                    ->get("/add-to-cart/$productId");
        $response->assertSessionHas('cart');
        $this->assertEquals(200, $response->status());
    }
}
