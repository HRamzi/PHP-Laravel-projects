<?php

namespace Framework\Middleware;

use Framework\Session;

class Authorize
{
    /**
     * Check if user is authenticated
     * 
     * @return bool
     */
    public function isAuthenticated()
    {
        return Session::has('user');
    }

    /**
     * Handle the user's request
     * 
     * @param string $role
     * @return bool
     */
    public function handle($role){
    if ($role === 'guest' && $this->isAuthenticated()) {
        redirect('/');
        return false; // Explicitly returning false after redirect
    } elseif ($role === 'auth' && !$this->isAuthenticated()) {
        redirect('/auth/login');
        return false; // Explicitly returning false after redirect
    }
    return true; // If no redirect occurred, return true
    }
}
