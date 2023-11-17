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
            'result' => Project::with('types', 'technologies')->orderByDesc('id')->paginate(12)
        ]);
    }

    public function types()
    {
        return response()->json([
            'status' => 'success',
            'result' => Type::with('projects')
        ]);
    }

    public function technologies()
    {
        return response()->json([
            'status' => 'success',
            'result' => Technology::with('projects')
        ]);
    }
}
