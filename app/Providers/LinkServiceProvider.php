<?php

namespace App\Providers;

use App\Link;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LinkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $whatsapp = Link::where('name','=','whatsapp')->first();
        $wlink = $whatsapp->link;
        View::share('whatsapp', $wlink);
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
