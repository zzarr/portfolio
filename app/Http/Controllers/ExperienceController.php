<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('admin.experience.index');
    }

    public function data()
    {
        $experience = Experience::latest();

        return DataTables::of($experience)

            ->addColumn('status', function ($row) {

                if ($row->is_current) {
                    return '<span class="badge bg-success">Masih Bekerja</span>';
                }

                return '<span class="badge bg-secondary">Selesai</span>';
            })

            ->addColumn('action', function ($row) {

                return '
                <div class="btn-list">

                    <button type="button"
                        class="btn btn-sm btn-warning btn-wave">
                        <i class="ri-pencil-line"></i>
                    </button>

                    <button type="button"
                        class="btn btn-sm btn-danger btn-wave">
                        <i class="ri-delete-bin-line"></i>
                    </button>

                </div>
            ';
            })

            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}
