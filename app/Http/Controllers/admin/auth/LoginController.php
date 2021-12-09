<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\auth\LoginRequest;
use App\Services\AdminService;

class LoginController extends Controller
{
    protected $service;

    public function __construct(AdminService $adminservice)
    {
        $this->service = $adminservice;
    }

    // Show Login Page
    public function showLoginPage()
    {
        return view('admin.auth.login');
    }

    // Login
    public function login(LoginRequest $request)
    {
        $loginStatus = $this->service->login($request->all());

        if ($loginStatus) {
            // Success login
            return redirect()->route('admin.index');
        } else {
            // Unsuccess login
            return redirect()->back()
                ->withInput()
                ->withErrors(["loginError" => "Incorrect user login details!"]);
        }
    }

    // Logout
    public function logout()
    {
        $this->service->logout();

        return redirect()->route('admin.login.show-login-page');
    }
}
