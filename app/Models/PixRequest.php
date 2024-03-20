<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PixRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'amount',
        'payment_link_qr_code',
        'payment_link_expiration',
        'created_at',
        'updated_at'
    ];

    public function user_email()
    {
        return $this->belongsTo(Appconfig::class);
    }
}
