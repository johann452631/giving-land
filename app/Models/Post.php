<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    // public static function getPurpuseValues()
    // {
    //     return [
    //         'd' => 'donación',
    //         'i' => 'intercambio',
    //     ];
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function moderators():BelongsToMany
    {
        return $this->belongsToMany(Moderator::class);
    }

    public function reportedPosts(): HasMany
    {
        return $this->hasMany(ReportedPost::class);
    }

    public function settlement():HasOne
    {
        return $this->hasOne(Settlement::class);
    }
}
