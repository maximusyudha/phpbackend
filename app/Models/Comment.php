<?php

namespace App\Models;
use App\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
