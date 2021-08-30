<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'initialize' => 'Initialize',
        'complete'   => 'Complete',
        'failed'     => 'Failed',
    ];

    public $table = 'transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'method',
        'sub_total',
        'tax',
        'other_charges',
        'amount',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function transactionOrders()
    {
        return $this->belongsToMany(Order::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
