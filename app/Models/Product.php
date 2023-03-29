<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'price',
        'sale_price',
        'description',
        'category_id',
        'is_active'
    ];

    protected function createdAt(): Attribute
    {
        $timezone = Auth::user()->information?->timezone ?? config('app.timezone');

        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->timezone($timezone)
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function averageReviews(): float
    {
        $reviews = $this->reviews;
        $averageStar = 0;

        /** @var ProductReview $review */
        foreach ($reviews as $review) {
            $averageStar += $review->star_count;
        }

        return (count($reviews) == 0) ? 0 : round($averageStar / count($reviews));
    }

    public function scopeLatestActive(Builder $query, ?int $take = 1)
    {
        $query->where('is_active', 1)->orderByDesc('created_at')->take($take);
    }
}
