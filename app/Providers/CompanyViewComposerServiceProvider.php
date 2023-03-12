<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\TypeInterior;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CompanyViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $company = Company::first();
            View::share('company', $company);

            $type_interiors = TypeInterior::all();
            View::share('type_interiors', $type_interiors);
        });
    }
}
