<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariationSize extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'product_variation_sizes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_id',
        'variationsize_id',
        'amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sizeProductCrustSizes()
    {
        return $this->hasMany(ProductCrustSize::class, 'size_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variationsize()
    {
        return $this->belongsTo(VariationsSize::class, 'variationsize_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
