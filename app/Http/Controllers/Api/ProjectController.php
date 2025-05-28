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
        return 'Sei nella index';
    }

        /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // return view('Partials.admin-project-Show', compact('project'));
        return 'Sei nella show numero ' . $project->id;
    }
}
