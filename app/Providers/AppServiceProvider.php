<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use DB;

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
        \Blade::directive('sidebar', function () {
            $getModule = DB::table('access')
                         ->select([
                             'access.*',
                             'module.name as moduleName'
                         ])
                         ->where('role_id', Auth::user()->role_id)
                         ->join('module','access.module_id','module.id')
                         ->get();

            $sidebar = '';
            if (count($getModule) > 0) {
                foreach ($getModule as $gmdl) {
                    $sidebar .= '<li class="active">';
                    $sidebar .= '<a href="">';
                    $sidebar .= '<i class="menu-icon fa fa-fw fa-tachometer"></i>';
                    $sidebar .= '<span class="mm-text ">'.$gmdl->moduleName.'</span>';
                    $sidebar .= '</a>';
                    $sidebar .= '</li>';
                }
            }

            return $sidebar;
        });
    }
}
