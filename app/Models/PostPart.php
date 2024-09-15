<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'type',
        'content',
        'image',
        'post_id',
        'order',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
