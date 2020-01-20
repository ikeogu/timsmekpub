<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Account extends Model
{
    //
    protected $fillable = ['user_id', 'status','signature','amount','mnth','day','acct_bal' ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
 