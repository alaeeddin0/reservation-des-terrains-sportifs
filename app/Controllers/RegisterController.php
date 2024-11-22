<?php

namespace App\Controllers;
class RegisterController extends BaseController {
    public function index(): string
    {
        return view('auth/register');
    }
}