<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'description',
        'is_active',
        'image',
    ];

    protected $dates = ['deleted_at'];

    public static function image($fileName, $category)
    {
        if (request()->hasFile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('image/categories/', $fileName);
            $category->image = $fileName;
        }
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
