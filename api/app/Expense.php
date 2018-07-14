<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $table = 'expense';
    public $timestamps = false;

    protected $fillable = [
        //'id',
        'recurrence', 
        'necessary', 
        'details', 
        'delta', 
        // 'user_id',
        'vendor_id'
    ];

    protected $hidden = ['user_id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function vendor(){
        return $this
            ->hasOne('App\Vendor', 'vendor_id')
            ->where('user_id', $this->user_id);
    }

    public function label(){
        return $this->belongsToMany('App\Label', 'expense_label', 'expense_id', 'label_id');
    }
}



