<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        request()->validate([
            'key'=>['nullable', 'string', 'min:5'],
        ]);
        // dd(request()->key); http://127.0.0.1:8001/api/projects?page=1&key=ciaos
        // dd(request()->key);
        if(request()->key) {
            $projects = Project::where('title', 'LIKE', '%' . request()->key . '%')->paginate(9);
        } else {
            $projects = Project::with('technologies', 'type')->paginate(9);
        }

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
    public function show(string $slug) {
        $project = Project::where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'result' => $project,
        ]);
    }
}
