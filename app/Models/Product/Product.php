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
        'img',
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

    public function filterProducts($categoryId, $minPrice, $maxPrice, $info, $filters)
    {
        $query =  Product::query();

        $query->where('price', '>=', $minPrice)->where('price', '<=', $maxPrice);

        $query->when(!empty($info), function ($q) use ($info) {
            return $q->where(function ($qu) use ($info){
                return $qu->where('name', 'like', '%' . $info . '%')->orWhere('description', 'like', '%' . $info . '%');
            });

        });

        $query->when(!!$categoryId, function ($q) use ($categoryId) {
            return $q->where(function ($qu) use ($categoryId) {
                $qu->whereHas('category', function ($category) use ($categoryId) {
                    return $category->where('id', $categoryId);
                })->orwhereHas('category', function ($category) use ($categoryId) {
                    return $category->where('category_id', $categoryId);
                });
            });
        });


        if(count($filters) > 0)
        {
            foreach ($filters as $filter)
            {
                $query->whereHas('productSpecs', function ($propertySec) use ($filter) {
                    $propertySec->whereHas('productOptions', function ($propertyOption) use ($filter) {
                        $propertyOption->where('category_option_id', $filter);
                    });
                });
            }
        }

        // $query->when(count($filter) != 0, function ($q) use ($filter) {
        //     return $q->whereHas('productSpecs', function ($spec) use ($filter) {
        //         return $spec->whereHas('productOptions', function ($options) use ($filter) {
        //             return $options->whereIn('category_option_id', $filter);
        //         });
        //     });
        // });

        $query->with(['productSpecs' => function($spec)
        {
            $spec->with('productOptions');
        }]);

        return $query->orderBy('id', 'DESC')->limit(15)->get();
    }

    public function findProduct($id)
    {
        return $this->where('id', '=', $id)
        ->with(['productSpecs' => function($spec)
        {
            $spec->with(['productOptions' => function($options)
            {
                $options->with('categoryOption');
            }])->with('categorySpec');
        }])->first();
    }

    public function getUserStoreProducts($id)
    {
        $query =  Product::query();

        $query->where('user_id', '=', $id);


        $query->with(['productSpecs' => function($spec)
        {
            $spec->with('productOptions');
        }]);

        return $query->orderBy('id', 'DESC')->limit(15)->get();
    }
}
