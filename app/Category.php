<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Category extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    public function product(){
        return $this->hasMany('App\Product', 'category_id');
    }
    public function getParent($id){
        return Category::find($id);
    }
}
