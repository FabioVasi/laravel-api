<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects()
    {
        return response()->json([
            'status' => 'success',
            'result' => Project::with('types', 'technologies')->orderByDesc('id')->paginate(12)
        ]);
    }

    public function show($slug) 
    {
        $project = Project::with('types', 'technologies')->where('slug', $slug)->paginate();
        if($project) {
            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Page not Found'
            ]);
        }
    }

    public function latest()
    {
        return response()->json([
            'success' => true,
            'result' => Project::with('types', 'technologies')->orderByDesc('id')->take(3)->get()
        ]);
    }
}
