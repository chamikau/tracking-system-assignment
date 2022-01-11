<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'name',
        'description'
    ];
//Relationship Category <---- One to Many ----> Subcategories
    public function category(){
        $this->hasOne(Category::class);
    }

//Relationship Issues <---- Many to Many -----> Subcategories
    public function issue()
    {
        return $this->belongsToMany(Issue::class);
    }

}
