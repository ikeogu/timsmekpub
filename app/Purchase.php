<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = ['reference','amount','email','bank','title','publish_id','status','paid_at','card_type','fees'];

    public function publish(){
        return $this->belongsTo(Publish::class);
    }
}
