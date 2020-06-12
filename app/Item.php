<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function getPriceAttribute()
    {
        return number_format((float) $this->original['price'] / 100, 2, '.', ' ').' zł';
    }

}
