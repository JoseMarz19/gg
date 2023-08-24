<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->sentence(),
            'url' =>'https://youtu.be/PJzWst-m-NA',
            'iframe'=>'<iframe width="1280" height="720" src="https://www.youtube.com/embed/PJzWst-m-NA" title="Segunda Sesión Seminario Liderazgo Efectivo EC1061" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            'platform_id'=> 1
        ];
    }
}
