<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Колонки
    protected $fillable = [
        'owner_id',
        'title',
        'is_active',
        'assignee_id',
        'deadline_date',
        'created_at',
        'updated_at',
    ];

    /**
     * Получить владельца проекта
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    /**
     * Получить ответственного за проект
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id', 'id');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeExpired(Builder $query): Builder
    {
        return $query->whereDate('deadline_date', '<', Carbon::now()->toDateString());
    }

}
