<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name_en',
        'name_ar',
        'photo',
        'solde',
        'price',
        'category_id',
        'description_en',
        'description_ar',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
