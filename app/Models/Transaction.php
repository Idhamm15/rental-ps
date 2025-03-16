<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'phone_number',
        'qty',
        'amount',
        'status',
        'payment_status',
        'description',
        'payment_method',
        'payment_type',
        'proof_of_payment',
        'deeplink_redirect',
        'qr_code',
        'va_number',
        'bill_key',
        'biller_code',
        'transaction_time',
        'booking_date',
        'expire_time',
        'settlement_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
