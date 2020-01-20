<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['user_id', 'amount', 'plan', 'reference','card_type', 'bank', 'status','paid_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
