<?php
namespace App\Http\Resources\CandidateContact;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class CandidateContactResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $id = $this->id;
        return [
            'title' => $this->title,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'links' => [
                'show' => $this->unless(Route::currentRouteName() === 'candidatecontact.show', function () {
                    return route('candidatecontact.show', [
                        'slug' => $this->slug
                    ]);
                }),
                'update' => route('candidatecontact.update', $id),
                'delete' => route('candidatecontact.destroy', $id),
            ]
        ];
    }
}
        