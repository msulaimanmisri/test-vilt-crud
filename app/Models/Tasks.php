<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tasks extends Model
{
    /** @use HasFactory<\Database\Factories\TasksFactory> */
    use HasFactory;

    protected $fillable = [
        'uuid',
        'parent_id',
        'title',
        'description',
        'priority',
        'status',
        'due_date',
    ];

    public function mainTask(): BelongsTo
    {
        return $this->belongsTo(Tasks::class, 'parent_id');
    }

    public function subTasks(): HasMany
    {
        return $this->hasMany(Tasks::class, 'parent_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_isd');
    }
}
