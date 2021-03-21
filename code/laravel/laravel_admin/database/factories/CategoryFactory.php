<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//         id          - integer
//    parent_id   - integer
//    order       - integer
//    title       - string
        return [
            'parent_id'=>rand(1,5),
            'order'=>rand(1,10),
            'title'=>$this->faker->text(20)
        ];
    }
}
