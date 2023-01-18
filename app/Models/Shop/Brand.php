<?php

namespace App\Models\Shop;

use App\Models\Address;
use App\Scopes\ShopScope;
use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * @var string
     */
    protected $table = 'shop_brands';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function addresses(): MorphToMany
    {
        return $this->morphToMany(Address::class, 'addressable', 'addressables');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'shop_brand_id');
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function scopeCheckAuth($query)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            $query->withoutGlobalScope(ShopScope::class);
        } else {
            $query->withGlobalScope('admin', new ShopScope());
        }

        return $query;
    }

    protected static function boot()
    {
        parent::boot();

    }
}
