<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Admincontroller extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
}

