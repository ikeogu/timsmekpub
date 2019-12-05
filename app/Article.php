<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title', 'content','name','email', 'category_id', 'code' ];

    public function category(){
      return  $this->belongsTo(Category::class);
    }
}
