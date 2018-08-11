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
        'when', 
        // 'user_id',
        'vendor_id'
    ];

    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function vendor()
    {
        return $this
            ->belongsTo('App\Vendor', 'vendor_id');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Label', 'expense_label', 'expense_id', 'label_id');
    }
}



