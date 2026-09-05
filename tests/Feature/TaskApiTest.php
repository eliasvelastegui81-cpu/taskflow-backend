<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_devuelve_200_con_la_coleccion_de_tareas(): void
    {
        $user = User::factory()->create();
        Task::factory()->count(3)->for($user)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)->assertJsonCount(3, 'data');
    }

    public function test_store_con_datos_invalidos_devuelve_422(): void
    {
        $response = $this->postJson('/api/tasks', []);

        $response->assertStatus(422);
    }

    public function test_store_con_datos_validos_crea_la_tarea_y_devuelve_201(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/tasks', [
            'title' => 'Escribir tests de la API',
            'user_id' => $user->id,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'Escribir tests de la API']);
    }
}
