<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkFeeds extends Model
{
    use HasFactory;

    protected $table = "feed_bookmarks";

    protected $fillable = [
        'user_id',
        'title',
        'external_url',
    ];
}
