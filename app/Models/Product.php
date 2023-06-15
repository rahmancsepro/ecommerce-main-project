<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class,'sub_sub_category_id');
    }
    public function productreviews()
    {
        return $this->hasMany(ProductReview::class,'product_id');
    }
    public function productimage()
    {
        return $this->hasMany(ProductMultiImage::class,'product_id');
    }
}
