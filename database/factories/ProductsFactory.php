<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=5,$asText=true);
        $slug = Str::slug($product_name,'-');
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description'=>$this->faker->text(100),
            'description'=>$this->faker->text(300),
            'price'=>'400',
            'qauntity'=>'50',
            'stock_status'=>'instock',
            'image'=>'25',
            'category_id'=>'1',
            'device_id'=>'1'
        ];
    }
}
