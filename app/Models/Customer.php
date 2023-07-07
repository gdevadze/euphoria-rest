<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'company_name'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn($value) => $this->name.' '.$this->surname
        );
    }

    public function companyName(): Attribute
    {
        return new Attribute(
            get: fn($value) => $this->company->name ?? ''
        );
    }
}
