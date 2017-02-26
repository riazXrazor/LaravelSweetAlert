<?php


namespace riazXrazor\LaravelSweetAlert;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class LaravelSweetAlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/LaravelSweetAlert'),
        ], 'public');

        Blade::directive("LaravelSweetAlertJS", function($expression)
        {
            $html = '<script src="'. URL::asset('vendor/LaravelSweetAlert/js/sweetalert2.min.js') .'"></script>';
            $html .= '<script>';

            $html .= '$(function () { ';

                              $html .= "<?php  if(LaravelSweetAlert::getMessage()){ ?>";
                               $html .= 'var flashMsg = \'<?= LaravelSweetAlert::getMessage() ?>\';';
                               $html .= 'console.log(flashMsg);';
                               $html .= 'var flashObj = $.parseJSON(flashMsg);';
                               $html .= 'console.log(flashObj);';
                               $html .= 'if(flashObj)';
                               $html .=' {
                                    swal(flashObj)
                                    ';
                                     $html .= "<?php  if(LaravelSweetAlert::getTask()){ ?>";
                                     $html .= '.then(<?=LaravelSweetAlert::gettask()?>)';
                                     $html .= "<?php   } ?>";
                                    $html .= ';
                                    }';
                                $html .= "<?php   } ?>";
                  $html .= '});';
                  $html .= '</script>';

             return $html;

        });

        Blade::directive("LaravelSweetAlertCSS", function($expression)
        {
            return '<link rel="stylesheet" href="{{ URL::asset(\'vendor/LaravelSweetAlert/css/sweetalert2.min.css\') }}" />';

        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LaravelSweetAlert::class, function ($app) {
            return new LaravelSweetAlert();
        });
    }
}