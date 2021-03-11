<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'type', 'title', 'start_date', 'end_date', 'content', 'image_cover',
    ];
}
