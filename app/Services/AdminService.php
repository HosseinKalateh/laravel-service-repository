<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AdminService {

    public function login(array $data)
    {
        $credential = [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        
        // Attempt to login
        if (Auth::guard('admin')->attempt($credential)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        auth()->logout();
    }
}
