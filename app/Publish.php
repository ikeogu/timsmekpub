<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    //
    protected $fillable = ['title','price','available','status','description','year_pub','content','cover_page','author_id',
    'isbn','category_id'];

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function purchase(){
        return $this->hasOne(Purchase::class);
    }
}
