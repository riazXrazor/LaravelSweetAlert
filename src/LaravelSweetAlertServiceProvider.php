<?php

namespace Riazxrazor\LaravelSweetAlert;

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

        Blade::directive('LaravelSweetAlertJS', function ($expression) {
            $html = '<script src="'.URL::asset('vendor/LaravelSweetAlert/js/sweetalert2.min.js').'"></script>';
            $html .= '<script>';

            $html .= '$(function () { ';

            $html .= '<?php  if(LaravelSweetAlert::getMessage()){ ?>';
            $html .= 'var flashMsg = \'<?= LaravelSweetAlert::getMessage() ?>\';';
            $html .= 'console.log(flashMsg);';
            $html .= 'var flashObj = $.parseJSON(flashMsg);';
            $html .= 'console.log(flashObj);';
            $html .= 'if(flashObj)';
            $html .= ' {
            
            
            if(flashObj.onBeforeOpen)
            {
               flashObj.onBeforeOpen = eval(flashObj.onBeforeOpen) 
            }
            
            if(flashObj.onOpen)
            {
               flashObj.onOpen = eval(flashObj.onOpen) 
            }
            
            if(flashObj.onClose)
            {
               flashObj.onClose = eval(flashObj.onClose) 
            }

            console.log(flashObj);
                                    swal(flashObj)
                                    ';
            $html .= '<?php  if(LaravelSweetAlert::getTask()){ ?>';
            $html .= '.then(<?=LaravelSweetAlert::getTask()?>)';
            $html .= '<?php   } ?>';
            $html .= ';
                                    }';
            $html .= '<?php   } ?>';
            $html .= '});';
            $html .= '</script>';

            return $html;
        });

        Blade::directive('LaravelSweetAlertCSS', function ($expression) {
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
        $this->app->bind(LaravelSweetAlert::class, function ($app) {
            return new LaravelSweetAlert();
        });

        $this->app->alias(LaravelSweetAlert::class, 'laravel-sweet-alert');
    }
}
