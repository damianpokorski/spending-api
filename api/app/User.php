<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;


class User extends Model
{
    public $table = 'user';
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



    // public __con
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];

    public static function fromRequest(){
        return User::where(['email' => $_SERVER['HTTP_X_USER_EMAIL']])->first();
    }

    public function expenses(){
        return $this->hasMany('App\\Expense', 'user_id');
    }

    public function vendors(){
        return $this->hasMany('App\\Vendor', 'user_id');
    }

    public function labels(){
        return $this->hasMany('App\\Label', 'user_id');
    }

    public function types(){
        return $this->hasMany('App\\Type', 'user_id');
    }
}



