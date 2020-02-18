<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emplacement extends Model
{
    protected $guarded=[];

    public function book(){
        return $this->hasMany(Book::class);
    }
}
