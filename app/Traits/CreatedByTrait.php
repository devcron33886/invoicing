<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait CreatedByTrait
{
    public static function booteCreatedByTrait()
    {
        static::addGlobalScope('created_by', function (Builder $builder) {
            $field = $printf('%s.%s', $builder->getQuery()->from, 'created_by');
            $builder->where($field, auth()->id())->orWhereNull($field);
        });
    }
}
