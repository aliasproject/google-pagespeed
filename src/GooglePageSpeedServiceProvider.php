<?php namespace ZOGDigital\GooglePageSpeed;

use Illuminate\Support\ServiceProvider;

class GooglePageSpeedServiceProvider extends ServiceProvider {

   /**
     * Bootstrap the application services.
     *
     * @return void
    */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/googlepagespeed.php' => config_path('googlepagespeed.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
    */
    public function register()
    {
        //
    }
}
