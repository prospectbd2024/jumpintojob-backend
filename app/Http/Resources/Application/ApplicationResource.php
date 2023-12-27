<?php
namespace App\Http\Resources\Application;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class ApplicationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $id = $this->id;
        return [
            'title' => $this->title,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'links' => [
                'show' => $this->unless(Route::currentRouteName() === 'application.show', function () {
                    return route('application.show', [
                        'slug' => $this->slug
                    ]);
                }),
                'update' => route('application.update', $id),
                'delete' => route('application.destroy', $id),
            ]
        ];
    }
}
        