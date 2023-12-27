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
            'id' => $id,
            'name' => $this->name,
            'created_at' => $this->created_at->format('d-m-Y'),
        ];
    }
}
