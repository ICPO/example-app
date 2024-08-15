<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    # указать id поле по умолчанию можно вот так
    # protected $primaryKey = '';

    # указать имя таблицы на всякий случай можно вот так
    #  protected $table = '';

    # отключить автоинкремент
    # public $incrementing = false;

    # указывает соединение к базе данных
    # protected $connection = 'other-base';

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

    # работает аналогично fillable, но наоборот. Тут перечисляем свойства, которые не хотим заполнять
    # protected $guarded = [];

    # можно перечислить какие нибудь скрытые поля. Они не будут выводиться
    #protected $hidden = [];

    # указываем, какой тип должен быть у свойства при выводе. Например, is_active => int
    protected $casts = [];

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
