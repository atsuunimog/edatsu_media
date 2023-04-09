<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = "events";

    protected $fillable = [
        'u_id',
        'user_role',
        'title',
        'description',
        'location',
        'event_date',
        'source_url',
        'region', 
        'country'
    ];

}
