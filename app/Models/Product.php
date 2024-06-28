<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;
    protected $with = ['translations'];

    protected $guarded = [];

    public $translatedAttributes = ['name', 'description'];

    protected $appends = ['image_path'];

    public function getActive()
    {
        return $this->is_active == 1 ? 'مفعل' : 'غيرمفعل';
    }
    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/' . $this->image);

    }//end of image path attribute

    public function features()
    {
        return $this->hasMany(Feature::class);
    }//end of products

    public function product()
    {
        return $this->hasOne(ProductTranslation::class);
    }//end of products


    public function category()
    {
        return $this->belongsTo(Category::class);

    }//end fo category

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');

    }//end of orders

}//end of model
