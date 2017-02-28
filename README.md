
# LaravelSweetAlert

[![GitHub Author](https://img.shields.io/badge/author-@riazXrazor-blue.svg?style=flat-square)](https://github.com/riazXrazor)
[![GitHub release](https://img.shields.io/github/release/riazXrazor/LaravelSweetAlert.svg?style=flat-square)](https://github.com/riazXrazor/LaravelSweetAlert/releases)
[![GitHub license](https://img.shields.io/badge/license-License-GPL%20v3-blue.svg?style=flat-square)](https://raw.githubusercontent.com/riazXrazor/LaravelSweetAlert/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/riazXrazor/LaravelSweetAlert.svg?style=flat-square)](https://github.com/riazXrazor/LaravelSweetAlert/issues)

[![StyleCI](https://styleci.io/repos/83233450/shield)](https://styleci.io/repos/83233450)
[![Code Climate](https://img.shields.io/codeclimate/github/riazXrazor/LaravelSweetAlert.svg?style=flat-square)](https://codeclimate.com/github/riazXrazor/LaravelSweetAlert)
[![Code Climate](https://img.shields.io/codeclimate/coverage/github/riazXrazor/LaravelSweetAlert.svg?style=flat-square)](https://codeclimate.com/github/riazXrazor/LaravelSweetAlert/coverage)
[![Code Climate](https://img.shields.io/codeclimate/issues/github/riazXrazor/LaravelSweetAlert.svg?style=flat-square)](https://codeclimate.com/github/riazXrazor/LaravelSweetAlert/issues)

Laravel package to show beautiful flash message.
Its basically a laravel wrapper for the beautiful
and very good and useful jquery plugin
[SweetAlert2](https://limonte.github.io/sweetalert2)
.

## Installation

Open `composer.json` and add this line below.

```json
{
    "require": {
        "riazXrazor/LaravelSweetAlert": "^1.0.0"
    }
}
```

Or you can run this command from your project directory.

```console
composer require riazXrazor/LaravelSweetAlert
```

## Configuration

Open the `config/app.php` and add this line in `providers` section.

```php
riazXrazor\LaravelSweetAlert\LaravelSweetAlertServiceProvider::class,
```

Publish public `assets` by running this command.

```console
php artisan vendor:publish --tag=public --force
```

Place this blade directive at the `head` section of the html of 
layout blade template
```blade
@LaravelSweetAlertCSS
```
Place this blade directive at the end before `</body>` section of the html of 
layout blade template
```blade
@LaravelSweetAlertJS
```

## Usage

You can use the function like this.

```php
// top of controller
use riazXrazor\LaravelSweetAlert;

// in the controller method 
LaravelSweetAlert::setMessageSuccess("flash message")
LaravelSweetAlert::setMessageError("error flash message")
LaravelSweetAlert::setMessageSuccessConfirm("flash message")
LaravelSweetAlert::setMessageErrorConfirm("error flash message")

// for more customization

 LaravelSweetAlert::setMessage([
                        'title' => 'Successful',
                        'text' => $text,
                        'timer' => 2000,
                        'type' => 'success',
                        'showConfirmButton' =>false
                    ]);

```

when the when is redirected to another route
 a beautiful flash message appears
 
 for more customization options please refer to 
[SweetAlert2](https://limonte.github.io/sweetalert2)
, just pass the js object as associative array in the
`setMessage` method. 