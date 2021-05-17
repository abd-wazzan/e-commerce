<?php

namespace App\Models\Product;

use App\Models\Category\CategoryOption;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOption extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_spec_id',
        'category_option_id',
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
        'product_spec_id' => 'integer',
        'category_option_id' => 'integer'
    ];

    public function productSpec()
    {
        return $this->belongsTo(ProductSpec::class);
    }

    public function categoryOption()
    {
        return $this->belongsTo(CategoryOption::class);
    }
}
