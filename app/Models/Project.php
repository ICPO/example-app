<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    # в данном св-ве надо перечислять все колонки с таблички
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }

    /**
     * Получить ответственного за проект
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee()
    {
        return $this->belongsTo(User::class,'assignee_id','id');
    }

}
