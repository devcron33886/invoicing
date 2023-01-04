<?php

namespace App\Models;

use Carbon\Carbon;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates=[
        'due_date',
        'invoice_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable=[
        'customer_id',
        'user_id',
        'invoice_number',
        'due_date',
        'invoice_date',
        'subtotal',
        'tax',
        'total',
        'notes',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getFormattedInvoiceDate(): string
    {
        return  Carbon::parse($this->invoice_date)->toDayDateTimeString();
    }
    public function getTotal() :Money
    {
        return Money::USD($this->total);
    }
}
