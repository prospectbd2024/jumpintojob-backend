<?php
namespace App\Http\Resources\Employer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $id = $this->id;
        return [
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d-m-Y'),
            'links' => [
                'show' => route('employer.show', $this->slug),
                'update' => route('employer.update', $id),
                'delete' => route('employer.destroy', $id),
            ]
        ];
    }
}
        