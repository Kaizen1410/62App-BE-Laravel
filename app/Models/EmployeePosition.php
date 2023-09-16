<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeePosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'deleted_at'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function employees(): HasMany {
        return $this->hasMany(Employee::class);
    }
}
