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
        // id, 
        'email', 
        'first_name', 
        'last_name', 
        'password', 
        'currency',
        // auth token
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];

    public function expenses(){
        return $this->hasMany('App\Expense', 'user_id');
    }

    public function vendors(){
        return $this->hasMany('App\Vendor', 'user_id');
    }

    public function labels(){
        return $this->hasMany('App\Label', 'user_id');
    }
}



