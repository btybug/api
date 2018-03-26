<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

namespace BtyBugHook\Api\Providers;

use Btybug\btybug\Models\Routes;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class ModuleServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../views', 'bty_api');
        $this->loadViewsFrom(__DIR__ . '/../views', 'bty_api');

        $this->loadTranslationsFrom(__DIR__ . '/../storage/bty_api', 'st_hint_path');
        $this->loadViewsFrom(__DIR__ . '/../storage/bty_api', 'st_hint_path');

        \Eventy::action('admin.menus', [
            "title" => "Api",
            "custom-link" => "#",
            "icon" => "fa fa-anchor",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Requested",
                    "custom-link" => "/admin/bty-api",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "Approved",
                    "custom-link" => "/admin/bty-api/approved",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "Manage",
                    "custom-link" => "/admin/bty-api/manage",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ]
            ]]);


        Routes::registerPages('btybug.hook/api');
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

    }

}

