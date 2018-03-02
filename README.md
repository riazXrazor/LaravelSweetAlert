
# LaravelSweetAlert

[![GitHub Author](https://img.shields.io/badge/author-@riazXrazor-blue.svg?style=flat-square)](https://github.com/riazXrazor)
[![GitHub release](https://img.shields.io/github/release/riazxrazor/laravelsweetalert.svg?style=flat-square)](https://github.com/riazXrazor/LaravelSweetAlert/releases)
[![GitHub license](https://img.shields.io/badge/License-GPL%20v3-blue.svg?style=flat-square)](https://raw.githubusercontent.com/riazXrazor/LaravelSweetAlert/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/riazXrazor/LaravelSweetAlert.svg?style=flat-square)](https://github.com/riazXrazor/LaravelSweetAlert/issues)

[![StyleCI](https://styleci.io/repos/83233450/shield)](https://styleci.io/repos/83233450)

Laravel package to show beautiful flash message.
Its basically a laravel wrapper for the beautiful
and very good and useful jquery plugin
[SweetAlert2](https://limonte.github.io/sweetalert2)
.
Using `SweetAlert2 : 7.13.0`



## Installation

Open `composer.json` and add this line below.

```json
{
    "require": {
        "riazxrazor/laravel-sweet-alert": "^1.2.0"
    }
}
```

Or you can run this command from your project directory.

```console
composer require riazxrazor/laravel-sweet-alert
```

## Configuration

Open the `config/app.php` and add this line in `providers` section.

```php
Riazxrazor\LaravelSweetAlert\LaravelSweetAlertServiceProvider::class,
```

add this line in the `aliases` section.

```php
'LaravelSweetAlert' => Riazxrazor\LaravelSweetAlert\LaravelSweetAlert::class

```

Publish public `assets` by running this command.

```console
php artisan vendor:publish --tag=public --force
```
Place this blade directive at the end before `</body>` section of the html of 
layout blade template
```blade
@LaravelSweetAlertJS
```

## Usage

You can use the function like this.

```php


// in the controller method 
\LaravelSweetAlert::setMessageSuccess("flash message")
\LaravelSweetAlert::setMessageError("error flash message")
\LaravelSweetAlert::setMessageSuccessConfirm("flash message")
\LaravelSweetAlert::setMessageErrorConfirm("error flash message")

// for more customization

 LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => $text,
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);
                    

\LaravelSweetAlert::setMessage([
        'title' => 'Auto close alert!',
        'text' => 'I will close in 5 seconds.',
        'timer' =>  5000,
            'onOpen' => '() => { swal.showLoading() }',
        ],
        
        // second argument array of js function each element will be a then to swal
        
        ['(result) => {
  if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.timer
  ) {
    console.log("I was closed by the timer")
  }
}'],

// third argument is a catch function to the promise of swal

'(e)=>console.log(e)'); 

```

when the when is redirected to another route
 a beautiful flash message appears
 
 for more customization options please refer to 
[SweetAlert2](https://limonte.github.io/sweetalert2)
, just pass the js object as associative array in the
`setMessage` method. 
