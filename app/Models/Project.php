<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'image_url',
        'total_story_point',
        'done_story_point',
        'status',   // 1: Proposal, 2: Ongoing, 3: Done
        'deleted_at',
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function projectEmployees(): HasMany {
        return $this->hasMany(ProjectEmployee::class);
    }
}
