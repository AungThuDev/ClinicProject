<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree',
        'region',
        'date',
        'doctor_id',
    ];

    public function doctor() : BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
