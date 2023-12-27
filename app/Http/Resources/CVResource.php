<?php

namespace App\Http\Resources;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CVResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'template_id' => $this->template_id,
            'cv_link' => $this->cv_link,
            'title' => $this->title,
            'summary' => $this->summary,
//            'education' => new EducationResourceCollection(Cv::find($this->id)->first()->educations),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
