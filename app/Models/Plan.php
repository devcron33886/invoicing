<?php

namespace App\Models;

use App\Scopes\ActiveStatus;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'billing_period',
        'stripe_plan_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function booted()
    {
        static::addGlobalScope(new ActiveStatus());
    }

    public function formattedPrice(): Money
    {
        return Money::USD($this->price);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class)->withPivot(['quota']);
    }
}
