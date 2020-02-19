<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded=[];

    public function book(){
        return $this->belongsTo(Book::class);
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

            default:
                break;
        }
    }
}
