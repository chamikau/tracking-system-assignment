<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'body',
        'uuid',
        'slug'
    ];

//Relationship Issue <---- One to Many -----> Comments


    public function comments()
    {
        return $this->hasMany(Comment::class);

    }
//Relationship Issues <---- Many to Many -----> Categories
    public function category()
    {

        return $this->belongsToMany(Category::class);

    }

//Relationship Issues <---- Many to Many -----> Subcategories
    public function subcategory()
    {

        return $this->belongsToMany(SubCategory::class);

    }

//Relationship Issue <---- One to Many -----> Images
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
