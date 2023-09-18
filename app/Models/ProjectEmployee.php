<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'project_id',
        'start_date',
        'end_date',
        'status',   // 1: planning, 2:join
    ];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}