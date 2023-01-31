<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const IS_PUBLISHED = true;
    const IS_UNPUBLISHED = false;

    protected $table = 'products';
    protected $guarded = false;

    static function getPublished() {
        return [
          self::IS_PUBLISHED => 'Опубликовано',
          self::IS_UNPUBLISHED => 'Не опубликовано',
        ];
    }

    public function getPublishedTitleAttribute() {
        return self::getPublished()[$this->is_published];
    }
}
