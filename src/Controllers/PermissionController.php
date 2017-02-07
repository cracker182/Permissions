<?php

namespace Laralum\Permissions\Controllers;

use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permissions::index');
    }
}
