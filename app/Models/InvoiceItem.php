<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'invoice_id',
        'product_id',
        'quantity',
        'subtotal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invoice():BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function getFormattedSubtotal(): Money
    {
        return Money::USD($this->subtotal);
    }
}
