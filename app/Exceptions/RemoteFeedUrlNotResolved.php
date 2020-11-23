<?php

namespace App\Exceptions;

use Illuminate\Http\Client\ConnectionException;

class RemoteFeedUrlNotResolved extends ConnectionException
{
    protected $message = 'Could not resolve remote feed URL. Please check ADMIN_REMOTE_FEED_URL in your .env file.';
}
