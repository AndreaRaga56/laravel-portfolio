<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects=Project::with('technologies', 'type')->get();
        return response()->json([
            'success'=> true,
            'data' => $projects
        ]);
    }

        /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('technologies', 'type');
        return response()->json([
            'success'=> true,
            'data' => $project
        ]);
    }
}
