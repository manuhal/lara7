<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    /**
     * test bikin $guarded
     * The attributes that are mass guarded.
     *
     * @var array
     */
    // protected $guarded = [
    //     'email_verified_at',
    // ];


    // // bikin accessor, which mod the return data before displaying to public
    // // func name has to follow specifc rule getFieldNameAttribute()
    // public function getNameAttribute($name)
    // {   
    //     return 'Hello my name is '. ucfirst($name);
    // }

    // // bikin mutator, which mutate/mod the data data saving to DB
    // // func name has to follow specifc rule setFieldNameAttribute()
    // public function setPasswordAttribute($pwd)
    // {
    //     $this->attributes['password'] = bcrypt($pwd);        
    // }

}
