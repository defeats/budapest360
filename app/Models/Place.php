<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ["name", "slug", "category_id", "post_code", "address", "phone", "email", "description", "longitude", "latitude"];

    public function category()
    {
        return $this->belongsTo(Category::class); /* egy az egyhez vagy tobbhoz kapcsolat a kategoriakkal */
    }

    public function multimedia(): HasMany
    {
        return $this->hasMany(Multimedia::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // atlagos ertekeles metodus
    public function averageRating()
    {
        return round($this->reviews()->avg('star'), 1);
    }
}
