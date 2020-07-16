<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'shopName', 'profilePic', 'description', 'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
