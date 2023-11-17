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
            'status' => 'true',
            'result' => Project::with('types', 'technologies')->orderByDesc('id')
        ]);
    }

    public function types()
    {
        return response()->json([
            'status' => 'success',
            'result' => Type::all()
        ]);
    }

    public function technologies()
    {
        return response()->json([
            'status' => 'success',
            'result' => Technology::all()
        ]);
    }
}
