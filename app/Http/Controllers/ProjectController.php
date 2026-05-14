<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Project;

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
}
