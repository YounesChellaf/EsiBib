<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prise extends Model
{
    protected $guarded=[];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        switch ($this->statu) {
            case 'confirmed':
                echo '<label class="label label-success">Confirmé</label>';
                break;
            case 'rejected':
                echo '<label class="label label-danger">Refusé</label>';
                break;
            case 'draft':
                echo '<label class="label label-warning">Brouillon</label>';
                break;
            case 'fait':
                echo '<label class="label label-info">Faite</label>';
                break;

            default:
                break;
        }
    }

}
