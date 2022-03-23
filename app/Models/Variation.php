<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Variation extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stockCount()
    {
        return $this->descendantsAndSelf->sum(fn ($variation) => $variation->stocks->sum('amount'));
    }

    public function inStock()
    {
        return $this->stockCount() > 0;
    }

    public function outOfStock()
    {
        return !$this->inStock();
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function lowInStock()
    {
        return $this->inStock() && $this->stockCount() <= 5;
    }

    public function formattedPrice()
    {
        return money($this->price);
    }
}
