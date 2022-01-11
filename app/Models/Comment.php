<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'issue_id',
        'body',
    ];


//Relationship Issue <---- One to Many -----> Comments

    public function issue(){
        $this->hasOne(Issue::class);
    }




//Relationship Comment <---- One to Many -----> Images

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
