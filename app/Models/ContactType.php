<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactType extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'contact_use_type_id',
        'type',
        'validationRegex'
    ];

    public function contact(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
    public function contact_use_types(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ContactUseType::class);
    }

}
