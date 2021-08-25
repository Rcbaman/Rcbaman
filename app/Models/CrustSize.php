<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrustSize extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'crust_sizes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'crust_id',
        'size_id',
        'amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function crust()
    {
        return $this->belongsTo(Crust::class, 'crust_id');
    }

    public function size()
    {
        return $this->belongsTo(VariationsSize::class, 'size_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
