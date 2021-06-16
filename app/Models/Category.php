<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $fillable = ['code', 'name', 'description', 'image', 'name_en', 'description_en'];

    public static function where(string $string, $code)
    {
    }

    public static function paginate(int $int)
    {
    }

    public static function create(array $params)
    {
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
