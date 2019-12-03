<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title', 'content','name','email', 'category_id', 'code' ];

    public function category(){
        $this->belongsTo(Category::class);
    }
}
