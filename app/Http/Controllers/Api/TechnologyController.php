<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index() 
    {
        return response()->json([
            'status' => 'success',
            'result' => Technology::all()
        ]);
    }

    public function show($slug) 
    {
        $technology = Technology::with('projects')->where('slug', $slug)->paginate(12);
        if($technology) {
            return response()->json([
                'success' => true,
                'result' => $technology
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Page not Found'
            ]);
        }
    }
}
