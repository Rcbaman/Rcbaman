<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ingredients';

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

    public function ingredientsProductIngredients()
    {
        return $this->belongsToMany(ProductIngredient::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
