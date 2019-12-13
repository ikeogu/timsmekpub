<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipFee extends Model
{
    //
    protected $fillable= ['city','fee'];

    public function publish(){
        return $this-belongsTo('App\Publish');
        
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
