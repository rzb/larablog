<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminNotFound extends ModelNotFoundException
{
    protected $message = 'Admin user not found. Did you forget to run `php artisan db:seed`?';
}
