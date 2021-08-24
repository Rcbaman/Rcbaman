<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerDetail extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const GENDER_SELECT = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    public $table = 'customer_details';

    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_number',
        'dob',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customerCustomerAddresses()
    {
        return $this->hasMany(CustomerAddress::class, 'customer_id', 'id');
    }

    public function customerOrders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
