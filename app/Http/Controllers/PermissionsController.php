<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function user()
    {
        return view('permission.user');
    }

    public function author()
    {
        return view('permission.author');
    }

    public function admin()
    {
        return view('permission.admin');
    }
}
