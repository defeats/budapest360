<?php

namespace App\Models;

use App\Policies\MultimediaPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[UsePolicy(MultimediaPolicy::class)]

class Multimedia extends Model
{
    /** @use HasFactory<\Database\Factories\MultimediaFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ["user_id", "place_id", "file_path", "file_name", "mime_type", "file_size"];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
