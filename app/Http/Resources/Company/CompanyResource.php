<?php
namespace App\Http\Resources\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $id = $this->id;
        return [
            'name' => $this->name,
            'logo' => $this->logo,
            'cover_image' => $this->cover_image,
            'location' => $this->location,
            'company_type' => $this->company_type,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d-m-Y'),
            'links' => [
                'show' => route('company.show', $this->slug),
//                'update' => route('company.update', $id),
//                'delete' => route('company.destroy', $id),
            ]
        ];
    }
}
