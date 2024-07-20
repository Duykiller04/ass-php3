<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'image',
        'view',
        'description',
        'is_active',
    ];

    public function category(){
        $this->belongsTo(Category::class);
    }
    public function user(){
        $this->belongsTo(User::class);
    }
}
