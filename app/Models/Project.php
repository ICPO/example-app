<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'assigned_to',
    ];

    public function getName() // (4)
    {
        return $this->name;
    }

    public function setName($name) // (4)
    {
        $this->name = $name;
    }
}
