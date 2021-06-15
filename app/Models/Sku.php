<?php

namespace App\Models;

use App\Services\CurrencyConversion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'count', 'price'];
    protected $visible = ['id', 'count', 'price', 'product_name'];

    public static function find($id)
    {
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('count', '>', 0);
    }

    public function propertyOptions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PropertyOption::class, 'sku_property_option')->withTimestamps();
    }

    public function isAvailable(): bool
    {
        return !$this->product->trashed() && $this->count > 0;
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function getPriceAttribute($value): float
    {
        return round(CurrencyConversion::convert($value), 2);
    }

    public function getProductNameAttribute()
    {
        return $this->product->name;
    }
}
