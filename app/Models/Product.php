<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $guarded = false;

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function Tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }
}
