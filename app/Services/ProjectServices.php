<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectServices
{
    /**
     * Create project
     */
    public function createProject(array $data): Project
    {
        return DB::transaction(function () use ($data) {

            // create project
            $project = $this->storeProject($data);

            // store tags
            $this->storeProjectTags(
                $project,
                $data['tags'] ?? []
            );

            return $project->load('user', 'tags');
        });
    }

    /**
     * Store main project
     */
    private function storeProject(array $data): Project
    {
        // upload thumbnail
        $thumbnail = null;

        if (isset($data['thumbnail'])) {
            $thumbnail = $data['thumbnail']->store(
                'projects',
                'public'
            );
        }

        return Project::create([
            'user_id' => Auth::id(),

            'title' => $data['title'],

            'slug' => !empty($data['slug'])
                ? Str::slug($data['slug'])
                : Str::slug($data['title']),

            'thumbnail' => $thumbnail,

            'description' => $data['description'] ?? null,

            'content' => $data['content'] ?? null,

            'github_url' => $data['github_url'] ?? null,

            'is_featured' => $data['is_featured'] ?? false,
        ]);
    }

    /**
     * Store project tags
     */
    private function storeProjectTags(
        Project $project,
        array $tags
    ): void {

        if (!empty($tags)) {
            $project->tags()->sync($tags);
        }
    }

    /**
     * Get project with relations
     */
    public function getProjectWithRelations(
        int $id
    ): Project {

        return Project::with([
            'user',
            'tags'
        ])->findOrFail($id);
    }

    /**
     * Update project
     */
    public function updateProject(
        int $id,
        array $data
    ): Project {

        return DB::transaction(function () use ($id, $data) {

            $project = Project::findOrFail($id);

            // upload thumbnail baru
            if (isset($data['thumbnail'])) {

                // hapus thumbnail lama
                if ($project->thumbnail) {
                    Storage::disk('public')
                        ->delete($project->thumbnail);
                }

                $thumbnail = $data['thumbnail']->store(
                    'projects',
                    'public'
                );
            } else {
                $thumbnail = $project->thumbnail;
            }

            // update project
            $project->update([
                'title' => $data['title'],

                'slug' => !empty($data['slug'])
                    ? Str::slug($data['slug'])
                    : Str::slug($data['title']),

                'thumbnail' => $thumbnail,

                'description' => $data['description'] ?? null,

                'content' => $data['content'] ?? null,

                'github_url' => $data['github_url'] ?? null,

                'is_featured' => $data['is_featured'] ?? false,
            ]);

            // update tags
            $project->tags()->sync(
                $data['tags'] ?? []
            );

            return $project->load('user', 'tags');
        });
    }

    /**
     * Delete project
     */
    public function deleteProject(int $id): void
    {
        DB::transaction(function () use ($id) {

            $project = Project::findOrFail($id);

            // delete thumbnail
            if ($project->thumbnail) {
                Storage::disk('public')
                    ->delete($project->thumbnail);
            }

            // delete tags relation
            $project->tags()->detach();

            // delete project
            $project->delete();
        });
    }
}
