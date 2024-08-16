<?php

return [
    'required' => 'Поле «:attribute» обязательно к заполнению',
    'max.string'=>'Поле «:attribute» должно быть меньше «:max» символов',
    'min.string'=>'Поле «:attribute» должно быть больше «:min» символов',
    'attributes' => [
        'title' => 'Заголовок проекта',
        'owner_id' => 'Владелец проекта',
        'assignee_id' => 'Ответственный за проект',
        'deadline_date' => 'Дата сдачи проекта',
        'is_active' => 'Проект активен',
    ],
    'custom'=>[
        'is_active'=>[
            'required'=>'Поставьте галочку'
        ]
    ]
];
