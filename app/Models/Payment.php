<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable=[
        'user_id',
        'stripe_id',
        'subtotal',
        'tax',
        'total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function payments():BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
}
