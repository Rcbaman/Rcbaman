<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariationsSize extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'variations_sizes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sizeCrustSizes()
    {
        return $this->hasMany(CrustSize::class, 'size_id', 'id');
    }

    public function sizeIngredientsSizes()
    {
        return $this->hasMany(IngredientsSize::class, 'size_id', 'id');
    }

    public function sizeProductSizes()
    {
        return $this->hasMany(ProductSize::class, 'size_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
