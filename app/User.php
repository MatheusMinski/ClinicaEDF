<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     *
     */

    protected $primaryKey = 'idProfessor';

    protected $fillable = [
        'nome','cpf','telefone','dataNasc','email','password',
    ];


    public $rules = [

        'cpf' => 'required|min:14',
        'telefone' => 'required|min:15',
        'dataNasc' => 'required|min:10',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
