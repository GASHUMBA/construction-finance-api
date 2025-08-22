<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboards.admin'); // resources/views/dashboards/admin.blade.php
    }
}
