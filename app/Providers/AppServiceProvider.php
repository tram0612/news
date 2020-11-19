<?php

namespace App\Providers;
use App\Model\CatModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $catModel = new CatModel();
        $leftbar = $catModel->getItems();

        view()->share(compact('leftbar'));
    }
}
