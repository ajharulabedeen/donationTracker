<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    // protected $table = "posts";
    
    protected $fillable = [
            'id', 
            'user_id', 
            'title',
            'description',
            'total_needed',
            'total_collected', 
            'total_expanse',
            'start_date',
            'end_date',
            'active',
            'updated_at',
            'created_at',
        ];
    
}//class
