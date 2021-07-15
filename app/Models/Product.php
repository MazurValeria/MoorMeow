<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use App\Services\CurrencyConversion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Translatable;

    protected $fillable = [
        'name', 'code', 'price', 'category_id', 'description', 'image', 'hit', 'new', 'recommend', 'count', 'name_en',
        'description_en'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function skus(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sku::class);
    }

    public function properties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_product')->withTimestamps();
    }

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', 1);
    }

    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

    public function isHit(): bool
    {
        return $this->hit === 1;
    }

    public function isNew(): bool
    {
        return $this->new === 1;
    }

    public function isRecommend(): bool
    {
        return $this->recommend === 1;
    }

    public function getPriceAttribute($value): float
    {
        return round(CurrencyConversion::convert($value), 2);
    }
}
