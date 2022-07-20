<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;

use App\View\Components\Alert;

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
        //
        Blade::if('file', function ($value){

            if (config('filesystems.default')===$value){
                return true;
            }

            return false;
        });

        Blade::directive('welcome', function ($expression) {
            return "<?php echo '<h1>'.$expression.'</h1>' ?>";
        });

        Blade::directive('now', function ($expression='') {
            return "<?php echo date('d/m/Y H:i:s'); ?>";
        });

        Blade::component('client-alert', Alert::class);
    }
}
