<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Project;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function index()
    {
        $pageTitle = 'Projects';
        return view('admin.projects.index', compact('pageTitle'));
    }




    public function data()
    {
        $projects = Project::latest();

        return DataTables::of($projects)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <div class="btn-list">
                    <button type="button"
                        class="btn btn-sm btn-warning btn-wave edit-project"
                        data-id="' . $row->id . '">
                        <i class="ri-pencil-line"></i>
                    </button>

                    <button type="button"
                        class="btn btn-sm btn-danger btn-wave delete-project"
                        data-id="' . $row->id . '">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store
     */
    public function store(Request $request, ProjectService $services)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'github_url' => 'nullable|url',
            'is_featured' => 'nullable|boolean',
        ]);

        $project = $services->store($validated);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil ditambahkan',
            'data' => $project,
        ]);
    }

    public function show($id, ProjectService $services)
    {
        $project = $services->show($id);

        return response()->json([
            'success' => true,
            'data' => $project,
        ]);
    }

    public function update(
        Request $request,
        $id,
        ProjectService $services
    ) {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'github_url' => 'nullable|url',
            'is_featured' => 'nullable|boolean',
        ]);

        $services->update($id, $validated);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil diupdate',
        ]);
    }

    public function destroy($id, ProjectService $services)
    {
        $services->destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil dihapus',
        ]);
    }
}
