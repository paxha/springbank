<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileInfo extends Model
{
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
