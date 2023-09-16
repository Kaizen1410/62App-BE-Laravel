<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_position_id',
        'deleted_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function user(): HasOne {
        return $this->hasOne(User::class);
    }

    public function employeePosition(): BelongsTo {
        return $this->belongsTo(EmployeePosition::class);
    }

    public function leaves(): HasMany {
        return $this->hasMany(Leave::class);
    }

    public function approvedLeaves(): HasMany {
        return $this->hasMany(Leave::class);
    }
}
