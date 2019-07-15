<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'rate','status','discount','discount_type','discount_size'
    ];

    public function updateTax($tax)
    {
       return $this->update($tax);
    }
}
