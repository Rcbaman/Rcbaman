<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crust extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'crusts';

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

    public function crustProductCrustSizes()
    {
        return $this->hasMany(ProductCrustSize::class, 'crust_id', 'id');
    }

    public function crustsDishes()
    {
        return $this->hasMany(Dish::class, 'crusts_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
