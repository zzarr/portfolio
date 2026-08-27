<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Services\ExperienceServices;

use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('admin.experience.index');
    }

    public function data()
    {
        $experience = Experience::where('user_id', auth()->id())->latest();

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
                class="btn btn-sm btn-warning btn-wave edit-experience"
                data-id="' . $row->id . '">
                <i class="ri-pencil-line"></i>
            </button>

            <button type="button"
                class="btn btn-sm btn-danger btn-wave delete-experience"
                data-id="' . $row->id . '">
                <i class="ri-delete-bin-line"></i>
            </button>

        </div>
    ';
            })

            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function store(Request $request, ExperienceServices $services)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'position'     => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'sometimes|boolean',
            'details'      => 'sometimes|array',
            'details.*'    => 'sometimes|string|max:1000',
        ]);

        if ($data['is_current'] ?? false) {
            $data['end_date'] = null;
        }

        $services->createExperience($data);

        return response()->json([
            'success' => true,
            'message' => 'Experience berhasil ditambahkan'
        ]);
    }

    //tampilkan data experience
    public function show($id, ExperienceServices $services)
    {
        $experience = $services->getExperienceWithDetails($id);

        return response()->json([
            'success' => true,
            'data' => $experience
        ]);
    }

    //update data experience
    public function update(Request $request, $id, ExperienceServices $services)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'position'     => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'sometimes|boolean',
            'details'      => 'sometimes|array',
            'details.*'    => 'sometimes|string|max:1000',
        ]);

        if ($data['is_current'] ?? false) {
            $data['end_date'] = null;
        }

        $services->updateExperience($id, $data);

        return response()->json([
            'success' => true,
            'message' => 'Experience berhasil diperbarui'
        ]);
    }

    //hapus data experience
    public function destroy($id, ExperienceServices $services)
    {
        $services->deleteExperience($id);
        return response()->json([
            'success' => true,
            'message' => 'Experience berhasil dihapus'
        ]);
    }
}
