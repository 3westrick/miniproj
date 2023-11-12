<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->orderBy('order');
    }

    public function products(){
        $prods = collect();

        foreach ($this->categories as $category){
            $prods = $prods->merge($category->products);
        }
        return $prods->unique('id')->all();
    }
}

