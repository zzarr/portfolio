<?php

namespace App\Services;

use App\Models\Experience;
use App\Models\ExperienceDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExperienceServices
{
    public function createExperience(array $data): Experience
    {
        return DB::transaction(function () use ($data) {

            // create experience
            $experience = $this->storeExperience($data);

            // create details
            $this->storeExperienceDetails(
                $experience->id,
                $data['details'] ?? []
            );

            return $experience;
        });
    }

    /**
     * Store main experience
     */
    private function storeExperience(array $data): Experience
    {
        return Experience::create([
            'user_id'      => Auth::id(),
            'company_name' => $data['company_name'],
            'position'     => $data['position'],
            'start_date'   => $data['start_date'],
            'end_date'     => $data['end_date'] ?? null,
            'is_current'   => $data['is_current'] ?? false,
        ]);
    }

    /**
     * Store experience details
     */
    private function storeExperienceDetails(
        int $experienceId,
        array $details
    ): void {

        foreach ($details as $detail) {

            if (!empty($detail)) {

                ExperienceDetail::create([
                    'experience_id' => $experienceId,
                    'description'   => $detail,
                ]);
            }
        }
    }

    public function deleteExperience(int $id): void
    {
        DB::transaction(function () use ($id) {

            // delete details
            ExperienceDetail::where('experience_id', $id)->delete();

            // delete experience
            Experience::where('id', $id)->delete();
        });
    }
}
