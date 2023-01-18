<?php

namespace App\Models\Shop;

use App\Models\User;
use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'phone',
        'address',
        'user_id'
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCheckAuth($query)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            $query->withoutGlobalScope(UserScope::class);
        } else {
            $query->withGlobalScope('admin', new UserScope());
        }

        return $query;
    }

    protected static function boot()
    {
        parent::boot();


    }
}
