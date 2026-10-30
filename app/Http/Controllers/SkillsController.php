<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Skill;
use App\Models\SkillCategory;

class SkillsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Skills';
        $categories = SkillCategory::orderBy('name')->get(['id', 'name']);

        return view('admin.skills.index', compact('pageTitle', 'categories'));
    }

    public function data()
    {
        $skills = Skill::with('category')->latest();

        return DataTables::of($skills)
            ->addIndexColumn()
            ->addColumn('category_name', function (Skill $skill) {
                return $skill->category?->name ?? '-';
            })
            ->addColumn('action', function (Skill $skill) {
                return '
                <div class="btn-list">
                    <button type="button"
                        class="btn btn-sm btn-warning btn-wave edit-skill"
                        data-id="' . $skill->id . '">
                        <i class="ri-pencil-line"></i>
                    </button>

                    <button type="button"
                        class="btn btn-sm btn-danger btn-wave delete-skill"
                        data-id="' . $skill->id . '">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function categoryData()
    {
        return DataTables::of(SkillCategory::withCount('skills')->latest())
            ->addIndexColumn()
            ->addColumn('action', function (SkillCategory $category) {
                return '
                <div class="btn-list">
                    <button type="button" class="btn btn-sm btn-warning edit-skill-category"
                        data-id="' . $category->id . '">
                        <i class="ri-pencil-line"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger delete-skill-category"
                        data-id="' . $category->id . '">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function categories()
    {
        return response()->json([
            'data' => SkillCategory::orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:skill_categories,name',
        ]);

        SkillCategory::create(['name' => trim($data['name'])]);

        return response()->json(['success' => true, 'message' => 'Kategori berhasil ditambahkan']);
    }

    public function showCategory(int $id)
    {
        return response()->json([
            'success' => true,
            'data' => SkillCategory::findOrFail($id),
        ]);
    }

    public function updateCategory(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:skill_categories,name,' . $id,
        ]);

        SkillCategory::findOrFail($id)->update(['name' => trim($data['name'])]);

        return response()->json(['success' => true, 'message' => 'Kategori berhasil diperbarui']);
    }

    public function destroyCategory(int $id)
    {
        SkillCategory::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Kategori berhasil dihapus']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'skill_category_id' => 'required|exists:skill_categories,id',
        ]);

        Skill::create([
            'name' => $data['name'],
            'skill_category_id' => $data['skill_category_id'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skill berhasil ditambahkan',
        ]);
    }

    public function show(int $id)
    {
        $skill = Skill::with('category')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $skill->id,
                'name' => $skill->name,
                'skill_category_id' => $skill->skill_category_id,
            ],
        ]);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'skill_category_id' => 'required|exists:skill_categories,id',
        ]);

        Skill::findOrFail($id)->update([
            'name' => $data['name'],
            'skill_category_id' => $data['skill_category_id'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skill berhasil diperbarui',
        ]);
    }

    public function destroy(int $id)
    {
        Skill::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Skill berhasil dihapus',
        ]);
    }
}
