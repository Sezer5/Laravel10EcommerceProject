<?php

namespace App\Models;

use App\Http\Controllers\AdminPanel\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function parent(){
        return $this->belongsTo(CategoryController::class,'parent_id');
    }
    #one to many
    public function children(){
        return $this->hasMany(Category::class,'parent_id');
    }
}
