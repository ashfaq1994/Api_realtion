<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded  = [];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
