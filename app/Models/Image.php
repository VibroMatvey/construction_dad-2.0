<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $guarded = false;

    public function getImageUrlAttribute() {
        return url('storage/' . $this->image);
    }
}
