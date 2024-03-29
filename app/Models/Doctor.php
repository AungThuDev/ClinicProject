<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'address',
        'phone_no',
        'department_id',
    ];

    public function department() : BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function schedules() : HasMany
    {
        return $this->hasMany(Schedule::class);
    }
    public function qualifications() : HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
