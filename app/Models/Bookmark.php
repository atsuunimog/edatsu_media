<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Oppty;
use App\Models\Events;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = "general_bookmarks";

    protected $fillable = [
        'user_id',
        'post_id',
        'post_type',
    ];

    // public function opportunity(){
    //     return $this->belongsTo(Oppty::class, 'post_id', 'id');
    // }
    

    public function event(){
        $this->belongsTo(Events::class, 'post_id', 'id');
    }

    
}
