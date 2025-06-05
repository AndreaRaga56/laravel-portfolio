<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        // @dd($projects[1]->type);
        // @dd($projects[1]->type->name);
        return view('Partials.admin-project-Index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('Partials.admin-project-Create', compact(['types', 'technologies']));
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
            'type_id' => 'required|integer|between:1,7'
        ]);

        $data = $request->all();

        $validated['image'] = null;
        if ($request->image) {
            $path = Storage::putFile('projects', $data['image']);
            $validated['image'] = $path;
        }

        $newProject = new Project;
        $newProject->fill($validated);
        $newProject->save();

        if ($request->has('technologies')) {
            $newProject->technologies()->attach($data['technologies']);
        }

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
        $types = Type::all();
        $technologies = Technology::all();
        return view('Partials.admin-project-Edit', compact(['project', 'types', 'technologies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();


        if ($request->isMethod("PUT")) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'client' => 'required|string|max:255',
                'period' => 'required|integer|min:0|max:255',
                'summary' => 'required|string',
                'type_id' => 'required|integer|between:1,7'
            ]);
        } elseif ($request->isMethod("PATCH")) {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'client' => 'sometimes|string|max:255',
                'period' => 'sometimes|integer|min:0|max:255',
                'summary' => 'sometimes|string',
                'type_id' => 'sometimes|integer|between:1,7'
            ]);
        } else {
            abort(405, 'Metodo Non consentito');
        }

        if ($request->image) {
            $path = Storage::putFile('projects', $data['image']);
        }



        if (array_key_exists("image_action", $data)) {
            if ($data['image_action'] != 'Mantieni') {
                if ($data['image_action'] == 'Elimina') {
                    Storage::delete($project->image);
                    $validated['image'] = null;
                } elseif ($data['image_action'] == 'Aggiorna') {
                    if ($request->image) {
                        Storage::delete($project->image);
                        $path = Storage::putFile('projects', $data['image']);
                        $validated['image'] = $path;
                    } else {
                        return redirect()->route('projects.edit', $project);
                    }
                }
            }
        } else {
            $validated['image'] = null;
            if (array_key_exists("image", $data)) {
                $path = Storage::putFile('projects', $data['image']);
                $validated['image'] = $path;
            }
        }

        // foreach ($validated as $key => $value) {
        //     $project->$key = $value;
        // }
        $project->update($validated);

        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->technologies()->detach();
        $project->delete();

        return redirect()->route('projects.index');
    }
}
