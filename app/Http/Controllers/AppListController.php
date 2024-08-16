<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AppListController extends Controller
{
    public function index() {
        $applications = Application::all();

        return view('admin/app-list', ['applications' => $applications]);
    }
}
