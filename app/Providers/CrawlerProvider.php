<?php

namespace App\Providers;

use App\Services\CrawlerService;
use Illuminate\Support\ServiceProvider;

class CrawlerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrawlerService::class, function(){
            return new CrawlerService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
