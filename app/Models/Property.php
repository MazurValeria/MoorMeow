<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes, Translatable;

    protected $fillable = ['name', 'name_en'];

    public function propertyOptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PropertyOption::class);
    }

    //TODO: check table name and fields
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
