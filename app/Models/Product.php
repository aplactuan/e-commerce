<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function formattedPrice()
    {
        return money($this->price);
    }

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}
