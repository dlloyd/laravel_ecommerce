<?php

namespace Beone;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
  use HasMediaTrait;

  protected $fillable = ['name','priceUnit','product_type_id', 'description'];

  public function type(){
    return $this->belongsTo('Beone\ProductType','product_type_id');
  }

  public function sizes(){
    return $this->belongsToMany('Beone\ProductSize','product_size');
  }

  public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->performOnCollections('images', 'downloads');
    }

}
