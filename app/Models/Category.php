<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
    ];

//Relationship Category <---- One to Many ----> Subcategories
    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }

//Relationship Issues <---- Many to Many -----> Categories
    public function issue()
    {
        return $this->belongsToMany(Issue::class);
    }

}
