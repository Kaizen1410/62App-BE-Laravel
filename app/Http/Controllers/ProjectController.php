<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query('search');
        $sort = $request->query('sort') ? $request->query('sort') : 'name';
        $direction = $request->query('direction') ? $request->query('direction') : 'asc';
        $per_page = $request->query('per_page') ? $request->query('per_page') : 10;

        $projects = Project::where('deleted_at', null)
            ->where('name', 'like', '%' . $search . '%' )
            ->orderBy($sort, $direction)
            ->paginate($per_page);

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'start_date' => 'date',
            'end_date' => 'date',
            'image_url' => 'required|image|mimes:jpg,jpeg,png|size:5000',
            'total_story_point' => 'required|integer',
            'done_story_point' => 'required|integer',
            'status' => 'required|integer|min:1|max:3',
        ]);

        $filename = time() . '-' . $request->file('image_url')->getClientOriginalName();
        $image = $request->file('image_url')->storeAs('project', $filename);
        $validated['image_url'] = url('/') . '/storage/' . $image;

        $project = Project::create($validated);

        return response()->json(['data' => $project,  'message' => 'Project Added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project) {
        return response()->json(['data' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'start_date' => 'date',
            'end_date' => 'date',
            'image_url' => 'image|mimes:jpg,jpeg,png|size:5000',
            'total_story_point' => 'required|integer',
            'done_story_point' => 'required|integer',
            'status' => 'required|integer|min:1|max:3',
        ]);

        if($request->hasFile('image_url')) {
            $filename = time() . '-' . $request->file('image_url')->getClientOriginalName();
            $image = $request->file('image_url')->storeAs('project', $filename);

            try {
                $prev_img = explode(url('/'), $project->image_url)[1];
                unlink(public_path($prev_img));
            } catch (\Throwable $th) {
            }

            $validated['image_url'] = url('/') . '/storage/' . $image;
        }

        $project->update($validated);

        return response()->json(['message' => 'Project Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $deleted = Project::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);

        return response()->json(['deleted' => $deleted, 'message' => 'Project Deleted']);
    }
}
