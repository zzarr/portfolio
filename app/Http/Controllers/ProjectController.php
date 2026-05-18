<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Project;
use App\Models\Tag;
use App\Services\ProjectServices;

class ProjectController extends Controller
{
    public function index()
    {
        $pageTitle = 'Projects';
        $tags = Tag::all();

        return view(
            'admin.projects.index',
            compact('pageTitle', 'tags')
        );
    }

    /**
     * DataTables
     */
    public function data()
    {
        $projects = Project::with('tags')
            ->latest();

        return DataTables::of($projects)

            ->addIndexColumn()

            ->addColumn('tags', function ($row) {

                return $row->tags
                    ->pluck('name')
                    ->implode(', ');
            })

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

            ->rawColumns([
                'action',
            ])

            ->make(true);
    }

    /**
     * Store project
     */
    public function store(
        Request $request,
        ProjectServices $services
    ) {

        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'description' => 'nullable|string',

            'content' => 'nullable|string',

            'github_url' => 'nullable|url',

            'is_featured' => 'nullable|boolean',

            'tags' => 'nullable|array',

            'tags.*' => 'exists:tags,id',
        ]);

        $project = $services->createProject(
            $validated
        );

        return response()->json([
            'success' => true,

            'message' => 'Project berhasil ditambahkan',

            'data' => $project,
        ]);
    }

    /**
     * Show project
     */
    public function show(
        int $id,
        ProjectServices $services
    ) {

        $project = $services
            ->getProjectWithRelations($id);

        return response()->json([
            'success' => true,

            'data' => $project,
        ]);
    }

    /**
     * Update project
     */
    public function update(
        Request $request,
        int $id,
        ProjectServices $services
    ) {

        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'description' => 'nullable|string',

            'content' => 'nullable|string',

            'github_url' => 'nullable|url',

            'is_featured' => 'nullable|boolean',

            'tags' => 'nullable|array',

            'tags.*' => 'exists:tags,id',
        ]);

        $project = $services->updateProject(
            $id,
            $validated
        );

        return response()->json([
            'success' => true,

            'message' => 'Project berhasil diupdate',

            'data' => $project,
        ]);
    }

    /**
     * Delete project
     */
    public function destroy(
        int $id,
        ProjectServices $services
    ) {

        $services->deleteProject($id);

        return response()->json([
            'success' => true,

            'message' => 'Project berhasil dihapus',
        ]);
    }
}
