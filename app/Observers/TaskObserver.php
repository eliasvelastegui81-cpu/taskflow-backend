<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    public function updated(Task $task): void
    {
        // TODO(sesion-03): descomenta el bloque de abajo.
        // wasChanged('status') es true solo si la columna 'status' cambió en este
        // save(); sin esa condición se registraría un log en CUALQUIER actualización
        // de la tarea (por ejemplo, al editar solo el título), no solo al cambiar de estado.
        // getOriginal('status') devuelve el valor ANTES del save(); $task->status ya
        // es el valor nuevo — así queda constancia de ambos en el log.
        if ($task->wasChanged('status')) {
            Log::info("Tarea #{$task->id} cambió de estado", [
                'anterior' => $task->getOriginal('status'),
                'nuevo' => $task->status,
            ]);
        }
    }
}
