<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_can_see_admin_panel(): void
    {
        $user = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($user)->get(route('admin.products.index'));

        $response->assertStatus(200);
    }

    public function test_admin_store_product()
    {
        $user = User::factory()->create(['is_admin' => 1]);

        $response = $this->actingAs($user)->post(route('admin.products.create'), [
            'title' => 'Name',
            'short_description' => 'Short description',
            'price' => '10',
            'description' => 'Description',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.products.index'));
        $this->assertCount(1, Product::all());
        $this->assertDatabaseHas('products', [
            'title' => 'Name',
            'short_description' => 'Short description',
            'price' => '10',
            'description' => 'Description',
        ]);
    }

    public function test_admin_update_product()
    {
        $user = User::factory()->create(['is_admin' => 1]);
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.products.update', ['product' => $product->id]), [
            'title' => 'Test title',
            'description' => 'Test description',
            'short_description' => 'Test short description',
            'category_id' => $category->id,
            'is_active' => 1,
            'price' => 20
        ]);

        $updatedProduct = Product::query()->first();

        $response->assertSessionHasNoErrors();
        $this->assertEquals('Test title', $updatedProduct->title);
        $this->assertEquals('Test description', $updatedProduct->description);
        $this->assertEquals('Test short description', $updatedProduct->short_description);
        $this->assertEquals($category->id, $updatedProduct->category_id);
        $this->assertEquals(1, $updatedProduct->is_active);
        $this->assertEquals(20, $updatedProduct->price);
    }

    public function test_admin_delete_product()
    {
        $user = User::factory()->create(['is_admin' => 1]);
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.products.delete', ['product' => $product->id]));

        $this->assertEquals(0, Product::query()->count());
    }
}
