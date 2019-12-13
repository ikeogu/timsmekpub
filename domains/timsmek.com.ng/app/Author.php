<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['name','sex', 'dob','pob','education', 'book_authored','photo','biography','email','instagram','twitter','linkin', ];
    
    public function publish(){
        return $this->hasMany(Publish::class);
    }
}
