<?php

use App\Product;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ViewProductsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function it_returns_200()
    {
        $response = $this->call('GET', '/api/v1/products');
        
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->status());
        $this->assertEquals([], $content);
    }

    /** @test */
    public function can_get_product_by_id()
    {
        $product = factory(Product::class)->create();

        $response = $this->call('GET', '/api/v1/products/' . $product->id);
        
        $this->assertEquals(200, $response->status());

        $content = json_decode($response->content(), true);

        $this->assertEquals($product->toArray(), $content);
    }

    /** @test */
    public function can_view_all_products()
    {
        factory(Product::class, 99)->create();

        $response = $this->call('GET', '/api/v1/products');
        
        $content = json_decode($response->getContent());

        $this->assertEquals(200, $response->status());
  
        $this->assertEquals(99, count($content));        
    }

    /** @test */
    public function it_returns_404_when_product_does_not_exist()
    {
        $response = $this->call('GET', '/api/v1/products/does-not-exist');
        
        $this->assertEquals(404, $response->status());

        $this->seeJson([
            'error' => 'Resource not found'
        ]); 
    }
}
