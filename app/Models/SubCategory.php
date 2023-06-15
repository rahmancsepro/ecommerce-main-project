<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with =['subsubcategory'];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class,'sub_category_id');
    }
}
