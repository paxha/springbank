<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category(){
        return $this->hasOne(MainCategory::class, 'id', 'main_category_id');
    }
}
