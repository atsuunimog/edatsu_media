<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oppty extends Model
{
    use HasFactory;

    protected $table = "opportunities";

    protected $fillable = [
        'u_id',
        'user_role',
        'cover_img',
        'title',
        'description',
        'deadline',
        'source_url',
        'direct_link',
        'category',
        'region', 
        'country',
        'continent'
    ];

    
    public function bookmark(){
        return $this->hasMany(Bookmark::class);
    }

}
