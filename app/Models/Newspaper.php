<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Newspaper extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'cat_id'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public static function uploadFile($request, $neededFile)
    {
        $fileName = "newspaper_" . time() . '_' . $neededFile->getClientOriginalName();
        $request->file('upload_image')->storeAs(
            'public/newspapers',
            $fileName
        );
        return $fileName;
    }
}
