<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        $brands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Fiat', 'Hyundai', 'Renault'];
        $models = ['Civic', 'Corolla', 'Gol', 'Onix', 'Fox', 'Fiesta', 'HB20', 'Duster'];
        $colors = ['Preto', 'Branco', 'Prata', 'Vermelho', 'Azul', 'Cinza', 'Marrom', 'Verde'];
        $types = ['Sedan', 'Hatch', 'SUV', 'Pickup', 'Van', 'Coupe'];

        return [
            'client_id' => Client::factory(),
            'brand' => $this->faker->randomElement($brands),
            'model' => $this->faker->randomElement($models),
            'year' => $this->faker->numberBetween(2010, 2024),
            'color' => $this->faker->randomElement($colors),
            'license_plate' => strtoupper($this->faker->bothify('???-####')),
            'chassis_number' => strtoupper($this->faker->bothify('??-############')),
            'type' => $this->faker->randomElement($types),
        ];
    }
}
