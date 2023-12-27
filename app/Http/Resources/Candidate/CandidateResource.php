<?php
namespace App\Http\Resources\Candidate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class CandidateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $id = $this->id;
        return [
            'title' => $this->title,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'links' => [
                'show' => $this->unless(Route::currentRouteName() === 'candidate.show', function () {
                    return route('candidate.show', [
                        'slug' => $this->slug
                    ]);
                }),
                'update' => route('candidate.update', $id),
                'delete' => route('candidate.destroy', $id),
            ]
        ];
    }
}
        