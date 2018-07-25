<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'label';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'id',
        'name',
        // 'user_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function expenses(){
        return $this
            ->belongsTo('App\Expense')
            ->where('user_id', $this->user_id);
    }
}



