<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=[
        'imagable_type',
        'imagable_id',
        'size',
        'path',
        'name',
        'extension'
    ];

//Relationship Issue <---- One to Many -----> Images
    public function issue()
    {
        return $this->hasOne(Issue::class);
    }

//Relationship Comment <---- One to Many -----> Images
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
}
