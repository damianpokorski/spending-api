<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpendingRegular extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'first_name', 
        'last_name', 
        'password', 
        'currency'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];
}


