<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Models\Client\Cart;
use App\Models\Client\OrderDetail;
use App\Models\Client\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'double',
        'category_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function productSpecs()
    {
        return $this->hasMany(ProductSpec::class);
    }

    public function filterProducts($mainCategoryId, $categoryId, $minPrice, $maxPrice, $info, $filter)
    {
        $query =  Product::query();

        $query->when(!!$mainCategoryId, function ($q) use ($mainCategoryId) {
            return $q->whereHas('category', function ($category) use ($mainCategoryId){
                return $category->where('category_id', $mainCategoryId);
            });
        });

        $query->when(!!$categoryId, function ($q) use ($categoryId) {
            return $q->where('category_id', $categoryId);
        });

        $query->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice);


        $query->when(!empty($info), function ($q) use ($info) {
            return $q->where('name', 'like', '%' . $info . '%')->orWhere('description', 'like', '%' . $info . '%');
        });

        $query->when(count($filter) != 0, function ($q) use ($filter) {
            return $q->whereHas('productSpecs', function ($spec) use ($filter) {
                return $spec->whereHas('productOptions', function ($options) use ($filter) {
                    return $options->whereIn('category_option_id', $filter);
                });
            });
        });

        return $query->orderBy('id', 'DESC')->limit(15)->get();
    }
}
