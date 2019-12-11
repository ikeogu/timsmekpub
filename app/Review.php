<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['user_id','publish_id','comment','subject','email','ratings'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function publish()
    {
        return $this->belongsTo('App\Publish');
    }

    
}
