<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProfessor extends Model
{
    public $fillable = [
        'id_professor', 'is_active', 'date'
    ];
}
