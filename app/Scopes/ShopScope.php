<?php

namespace App\Scopes;

use App\Models\Shop\Shop;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ShopScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $shopIds = Shop::where('user_id', auth()->id())->pluck('id')->toArray();
        $builder->whereIn('shop_id', $shopIds);
    }
}
