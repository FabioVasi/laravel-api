<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeController extends Controller
{
    public function index() 
    {
        return response()->json([
            'status' => 'success',
            'result' => Type::all()
        ]);
    }

    public function show($slug) 
    {
        $type = Type::with('projects')->where('slug', $slug)->paginate(12);
        if($type) {
            return response()->json([
                'success' => true,
                'result' => $type
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Page not Found'
            ]);
        }
    }
}
