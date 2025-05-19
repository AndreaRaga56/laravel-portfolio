<?php

namespace App\Http\Controllers\Admin;

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
        $projects = Project::all();
        return view('Partials.admin-project-Index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Partials.admin-project-Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'period' => 'required|integer|min:0|max:255',
            'summary' => 'required|string',
        ]);

        $newProject = new Project;
        $newProject->fill($validated);
        $newProject->save();

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('Partials.admin-project-Show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('Partials.admin-project-Edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        if ($request->isMethod("PUT")) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'client' => 'required|string|max:255',
                'period' => 'required|integer|min:0|max:255',
                'summary' => 'required|string',
            ]);
        } elseif($request->isMethod("PATCH")) {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'client' => 'sometimes|string|max:255',
                'period' => 'sometimes|integer|min:0|max:255',
                'summary' => 'sometimes|string',
            ]);
        }else{
            abort (405, 'Metodo Non consentito');
        }

        // foreach ($validated as $key => $value) {
        //     $project->$key = $value;
        // }
        $project->update($validated);

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
