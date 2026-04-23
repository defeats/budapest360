<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Favourite;
use App\Observers\PlaceObserver;
use App\Policies\PlacePolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Laravel\Sanctum\HasApiTokens;

#[UsePolicy(PlacePolicy::class)]
#[ObservedBy(PlaceObserver::class)]

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = ["name", "slug", "category_id", "post_code", "address", "phone", "email", "description", 
    "longitude", "latitude", "outdoor_seating", "wifi", "pet_friendly", "family_friendly", "card_payment", "free_parking", 
    "free_entry", "photo_spot", "accessible", "student_discount", "status", "price_range"];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $booleanFields = [
            'wifi', 'card_payment', 'pet_friendly', 'family_friendly', 
            'free_parking', 'free_entry', 'student_discount', 
            'outdoor_seating', 'photo_spot', 'accessible'
        ];

        foreach ($booleanFields as $field) {
            $query->when(isset($filters[$field]), function ($q) use ($field) {
                $q->where($field, true);
            });
        }

        return $query;
    }

    public function opentimes()
    {
        return $this->hasMany(OpenTime::class);
    }

    public function multimedias(): HasMany
    {
        return $this->hasMany(Multimedia::class);
    }

    public function getThumbnailUrl()
    {
        $firstMedia = $this->multimedias->first();

        if (!$firstMedia) {
            return asset('placeholder.jpg');
        }

        if (file_exists(public_path($firstMedia->file_path))) {
            return asset($firstMedia->file_path);
        }

        return asset('images/' . $firstMedia->file_name);
    }

    public function uploadImages(array $files)
    {
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $mime = $file->getClientMimeType();
            $size = $file->getSize();
            $saveAs = time() . '_' . $name;
            $destinationPath = public_path('images');

            $file->move($destinationPath, $saveAs);

            $this->multimedias()->create([
                'place_id' => $this->id,
                'user_id' => auth()->id(),
                'file_path' => 'images/' . $saveAs,
                'file_name' => $name,
                'mime_type' => $mime,
                'file_size' => $size
            ]);
        }
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAvgRoundedRating()
    {
        return round($this->reviews()->avg('star'), 1);
    }

    public function favourites() {
        return $this->hasMany(Favourite::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
