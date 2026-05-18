<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectServices
{
    /**
     * Store project
     */
    public function store(array $data)
    {
        // upload thumbnail
        if (isset($data['thumbnail'])) {
            $data['thumbnail'] = $data['thumbnail']->store(
                'projects',
                'public'
            );
        }

        // slug otomatis
        $data['slug'] = $data['slug']
            ? Str::slug($data['slug'])
            : Str::slug($data['title']);

        // featured
        $data['is_featured'] = $data['is_featured'] ?? 0;

        // user login
        $data['user_id'] = Auth::id();

        return Project::create($data);
    }

    /**
     * Show detail project
     */
    public function show($id)
    {
        return Project::with('user', 'tags')
            ->findOrFail($id);
    }

    /**
     * Update project
     */
    public function update(Project $project, array $data)
    {
        // upload thumbnail baru
        if (isset($data['thumbnail'])) {

            // hapus thumbnail lama
            if ($project->thumbnail) {
                Storage::disk('public')
                    ->delete($project->thumbnail);
            }

            $data['thumbnail'] = $data['thumbnail']->store(
                'projects',
                'public'
            );
        }

        // slug otomatis
        $data['slug'] = $data['slug']
            ? Str::slug($data['slug'])
            : Str::slug($data['title']);

        // featured
        $data['is_featured'] = $data['is_featured'] ?? 0;

        $project->update($data);

        return $project;
    }

    /**
     * Delete project
     */
    public function destroy(Project $project)
    {
        // hapus thumbnail
        if ($project->thumbnail) {
            Storage::disk('public')
                ->delete($project->thumbnail);
        }

        // hapus relasi tags
        $project->tags()->detach();

        return $project->delete();
    }
}
