<?php

namespace App\Providers;

use App\Models\Members;

abstract class Auth
{
    public static function login($user)
    {
        $_SESSION['user'] = Members::find($user->id);
    }

    public static function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

    public static function check(): bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    public static function user(): Members {
        return $_SESSION['user'];
    }
}
