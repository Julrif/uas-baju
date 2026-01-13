<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ["id"];

    function image () {
        return $this->hasOne(File::class, "id", "image_id");
    }
}
