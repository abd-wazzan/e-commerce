<?php

namespace App\Models\Product;

use App\Models\Category\CategorySpec;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSpec extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_specs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'has_multiple_option',
        'product_id',
        'category_spec_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'has_multiple_option' => 'boolean',
        'product_id' => 'integer',
        'category_spec_id' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function categorySpec()
    {
        return $this->belongsTo(CategorySpec::class);
    }

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
}
