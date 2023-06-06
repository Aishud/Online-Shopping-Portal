<?php

namespace App\Controllers;
use \App\Models\UserModel;

class signup extends BaseController
{
    public function index()
    {
        return view('signup');
    }
}
