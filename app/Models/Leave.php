<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date_leave',
        'is_approved',
        'approved_by'
    ];

    public function employee(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
    
    public function approvedBy(): BelongsTo {
        return $this->belongsTo(Employee::class);
    }
}
