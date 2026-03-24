<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middleware(['web', 'is_admin'])
            ->prefix('adminn')
            ->name('adminn.')
            ->group(base_path('routes/admin.php'));

        Route::middleware(['web', 'is_student'])
            ->prefix('student')
            ->name('student.')
            ->group(base_path('routes/student.php'));
    }
}
