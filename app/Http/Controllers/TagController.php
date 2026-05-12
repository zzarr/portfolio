<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tag;


class TagController extends Controller
{
    public function index()
    {
        $pageTitle = 'Tags';
        return view('admin.tag.index', compact('pageTitle'));
    }

    public function data()
    {
        $tags = Tag::latest();

        return DataTables::of($tags)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                <div class="btn-list">
                    <button type="button"
                        class="btn btn-sm btn-warning btn-wave edit-tag"
                        data-id="' . $row->id . '">
                        <i class="ri-pencil-line"></i>
                    </button>

                    <button type="button"
                        class="btn btn-sm btn-danger btn-wave delete-tag"
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
