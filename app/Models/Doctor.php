<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone_no',
        'department_id',
    ];

    public function department() : BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    public function schedules() : HasMany
    {
        return $this->hasMany(Doctor::class);
    }
    public function qualifications() : HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
