<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'status', 'user_id', 'publish_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
