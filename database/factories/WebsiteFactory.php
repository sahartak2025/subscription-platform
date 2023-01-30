<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Website>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $definition = [
                'name' => $this->faker->company,
                'url' => $this->faker->url
            ];
        } while (
            Website::query()
                ->where('name', $definition['name'])
                ->where('url', $definition['url'])
                ->exists()
        );

        return $definition;
    }

}
