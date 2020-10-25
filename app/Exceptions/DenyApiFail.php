<?php


namespace App\Exceptions;


use Throwable;
use Ubient\PwnedPasswords\Contracts\LookupErrorHandler;

class DenyApiFail implements LookupErrorHandler
{

    /**
     * Handles errors that occur during the lookup of a potentially Pwned Password.
     * Returns a boolean indicating whether the unverified password is accepted.
     *
     * @param Throwable $exception
     * @param string $password
     * @return bool
     */
    public function handle(Throwable $exception, string $password): bool
    {
        return false;
    }
}
