<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_number', 'customer_id', 'total_amount', 'order_status_id'];

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
        
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
