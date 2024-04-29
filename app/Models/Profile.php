<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'user_id'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function phoneNumbers():HasMany
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function social_media():BelongsToMany
    {
        return $this->belongsToMany(SocialMedia::class);
    }
}
