<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'cv_id' => $this->cv_id,
            'cv_file' => $this->cv_file,
            'forwarding_letter_type' => $this->forwarding_letter_type,
            'forwarding_letter' => $this->forwarding_letter,
            'submitted_at' => $this->submitted_at ? $this->submitted_at->toDateTimeString() : null,
            'interview_time' => $this->interview_time ? $this->interview_time->toDateTimeString() : null,
            'interview_notes' => $this->interview_notes,
            'rejection_reason' => $this->rejection_reason,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toDateTimeString() : null,
            'deleted_at' => $this->deleted_at ? $this->deleted_at->toDateTimeString() : null,
        ];
    }
}
