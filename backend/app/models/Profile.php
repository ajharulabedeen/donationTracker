<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'address',
        'email',
        'phone',
        'profession',
        'about_myself',
        'created_at',
        'updated_at'
    ];
}
