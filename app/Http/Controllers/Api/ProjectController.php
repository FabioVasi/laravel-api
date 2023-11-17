<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function projects()
    {
        return response()->json([
            'status' => 'success',
            'result' => Project::all()
        ]);
    }

    public function types()
    {
        return response()->json([
            'status' => 'success',
            'projects' => Type::all()
        ]);
    }

    public function technologies()
    {
        return response()->json([
            'status' => 'success',
            'projects' => Technology::all()
        ]);
    }
}
