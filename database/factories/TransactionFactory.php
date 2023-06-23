<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $loc = $this->faker->randomElement(['mali', 'maroc']);
        $use = [1, 2];

        if ($loc == 'maroc') {
            $monta = [15000, 20000, 5000];
        } else {
            $monta = [400, 320, 700];
        }

        $mont = $this->faker->randomElement($monta);
        $frais = 0;
        $taux = 0;
        $recu=0;

        if ($mont == 15000) {
            $frais = 1000;
            $taux = 62.5;
            $recu =($mont-$frais)/$taux;
        } elseif ($mont == 20000) {
            $frais = 2000;
            $taux = 62.5;
            $recu =($mont-$frais)/$taux;
        } elseif ($mont == 5000) {
            $frais = 500;
            $taux = 62.5;
            $recu =($mont-$frais)/$taux;
        } elseif ($mont == 400) {
            $frais = 30;
            $taux = 60.5;
            $recu =($mont-$frais)*$taux;
        } elseif ($mont == 320) {
            $frais = 45;
            $taux = 60.5;
            $recu =($mont-$frais)*$taux;
        } elseif ($mont == 700) {
            $frais = 50;
            $taux = 60.5;
            $recu =($mont-$frais)*$taux;
        }

        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->firstName(),
            'vers' => $loc,
            'envoye' => $mont,
            'recu' => $recu,
            'frais' => $frais,
            'taux' => $taux,
            'charges' => $this->faker->randomNumber(1),
            'statut' => 'effectue',
            'description' => $this->faker->sentence(15),
            'user_id' => $this->faker->randomElement($use),
        ];
    }
}
