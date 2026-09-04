<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        // TODO(sesion-03): descomenta las 4 líneas de abajo, una por una.
        return [
            // Título corto y realista: sentence(4) genera una "oración" de 4 palabras falsas.
            'title' => fake()->sentence(4),

            // Texto más largo para la columna description — un párrafo de relleno.
            'description' => fake()->paragraph(),

            // El status solo puede ser uno de estos 3 valores exactos (los mismos que
            // usará el frontend de React más adelante) — randomElement elige uno al azar.
            'status' => fake()->randomElement(['pendiente', 'en_progreso', 'completada']),

            // Toda tarea necesita un usuario dueño (user_id es clave foránea a users);
            // User::factory() crea un usuario de prueba nuevo y usa su id automáticamente.
            'user_id' => User::factory(),
        ];
    }
}
