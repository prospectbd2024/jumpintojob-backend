<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUseType extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'type',
    ];

    public function contact_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ContactType::class);
    }
}
