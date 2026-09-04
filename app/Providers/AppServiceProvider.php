<?php

namespace App\Providers;

use App\Models\Task;
use App\Observers\TaskObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // TODO(sesion-03): descomenta la línea de abajo.
        // Le dice a Laravel: "cada vez que un modelo Task dispare un evento (creating,
        // updating, deleting, etc.), avisa a TaskObserver" — va en boot() porque ahí
        // es donde Laravel ya terminó de cargar todos los servicios.
        Task::observe(TaskObserver::class);
    }
}
