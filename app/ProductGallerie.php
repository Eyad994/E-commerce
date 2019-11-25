<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallerie extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'gallery_image',
    ];
    protected $dates = ['deleted_at'];


    public static function imageGallery($fileName, $product_id)
    {
        if (request()->hasFile($fileName)) {

            foreach (request()->$fileName as $file) {
                $fileName = rand() . '.' . $file->getClientOriginalextension();
                $newFile = new ProductGallerie();
                $newFile->product_id = $product_id;
                $newFile->gallery_image = $fileName;
                if ($newFile->save()) {
                    $file->move('image/galleries/', $fileName);
                }
            }
        }

    }


}
