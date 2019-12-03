<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'description'];
    public function publish(){
        return $this->hasMany(Publish::class);
    }

    public function article(){
        return $this->hasMany(Article::class);
    }

}
