<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public $table = 'vendor';
    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];
    
    protected $hidden = ['user_id'];

    public function expenses(){
        return $this
            ->belongToMany('App\Expense', 'expense_id')
            ->where('user_id', $this->user_id);
    }
}