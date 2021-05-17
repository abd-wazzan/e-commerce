<?php

namespace App\Models\Category;

use App\Models\Product\ProductSpec;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorySpec extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'category_specs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'has_multiple_option',
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
        'category_id' => 'integer',
        'has_multiple_option' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryOptions()
    {
        return $this->hasMany(CategoryOption::class);
    }

    public function productSpecs()
    {
        return $this->hasMany(ProductSpec::class);
    }
}
