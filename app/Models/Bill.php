<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'landlord_id',
        'tenant_id',
        'rental_id',
        'due',
        'paid',
        'balance',
        'status'
    ];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
