<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function getPriceAttribute()
    {
        return strval($this->original['price'] / 100 ).' zł';
    }

}
