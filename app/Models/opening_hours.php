<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class opening_hours extends Model
{
    /** @use HasFactory<\Database\Factories\OpeningHoursFactory> */
    use HasFactory;
    use SoftDeletes;
}
