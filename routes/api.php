<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

// TODO(sesion-04): esta línea ya está lista — no necesitas tocarla, solo
// verificar que `php artisan route:list --path=tasks` muestre las 5 rutas
// una vez que completes TaskController.
Route::apiResource('tasks', TaskController::class);
