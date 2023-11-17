<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_projects = Project::all()->count();

        return view('admin.dashboard', compact('total_projects'));
    }
}
