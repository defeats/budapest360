<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpenTime extends Model
{
    /** @use HasFactory<\Database\Factories\OpenTimeFactory> */
    use HasFactory, SoftDeletes;
}
