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
        'customer_id',
        'ordertakenby_id',
        'order_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }

    public function customer()
    {
        return $this->belongsTo(CustomerDetail::class, 'customer_id');
    }

    public function ordertakenby()
    {
        return $this->belongsTo(User::class, 'ordertakenby_id');
    }

    public function customers()
    {
        return $this->belongsToMany(CustomerDetail::class);
    }

    public function ordertakenbies()
    {
        return $this->belongsToMany(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
