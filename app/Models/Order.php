<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ORDER_STATUS_SELECT = [
        'pending'    => 'Pending',
        'cooking'    => 'Cooking',
        'pickup'     => 'Pickup',
        'ondelivery' => 'on Delivery',
        'cancel'     => 'Cancel',
        'complete'   => 'Complete',
        'refund'     => 'Refund',
    ];

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'total_amount',
        'order_status',
        'transaction_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
