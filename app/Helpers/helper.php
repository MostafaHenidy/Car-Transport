<?php

use Illuminate\Support\Facades\Auth;

function role($guard, $role)
{
    if (Auth::guard($guard)->user()->hasAnyRole($role)) {
        return True;
    }
    return false;
}
