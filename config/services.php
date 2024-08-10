<?php
/**
 * Конфигурации для интеграций со сторонними сервисами
 * @docs https://github.com/laravel/laravel/blob/11.x/config/services.php
 */

return [
    // Для работы с Dummy Json
    'dummy'=>[
        'host' => env('DUMMYJSON_HOST'),
        'username' => env('DUMMYJSON_USERNAME'),
        'password' => env('DUMMYJSON_PASSWORD')
    ]
];
