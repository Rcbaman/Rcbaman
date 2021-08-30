<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const VARIATIONS_SELECT = [
        'simple'    => 'Simple',
        'variation' => 'Variation',
    ];

    public const STATUS_SELECT = [
        'available'    => 'Available',
        'unavailable'  => 'Un Available',
        'out_of_stock' => 'Out  Of  Stock',
    ];

    public $table = 'products';

    protected $appends = [
        'image',
        'multi_images',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'regular_price',
        'sale_price',
        'variations',
        'status',
        'slug',
        'profile_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function productProductSizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getMultiImagesAttribute()
    {
        $files = $this->getMedia('multi_images');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function profile()
    {
        return $this->belongsTo(ProductProfile::class, 'profile_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function crusts()
    {
        return $this->belongsToMany(Crust::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
