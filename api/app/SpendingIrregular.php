<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpendingIrregular extends Model
{
  public $table = 'spending_regular';
  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'spending_vendor_id', 
        'spending_type_id', 
        'spending_subtype_id', 
        'necessary', 
        'label',
        'delta'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id'];
}



