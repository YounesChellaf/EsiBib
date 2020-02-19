<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=[];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function domaine(){
        return $this->belongsTo(Domaine::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function emplacement(){
        return $this->belongsTo(Emplacement::class);
    }
    public function prise(){
        return $this->hasMany(Prise::class);
    }
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
