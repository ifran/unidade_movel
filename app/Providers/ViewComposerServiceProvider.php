<?php

namespace App\Providers;

use App\Services\UnitService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $unitService = new UnitService();
            $unitsLocations = $unitService->getAllUnitsFromLoggedCompany();

            $view->with('unitsLocations', $unitsLocations);
        });
    }

    public function register() {}
}
