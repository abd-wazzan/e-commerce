<?php

namespace App\Models\Category;

use App\Models\Product\ProductOption;
use App\Models\Product\ProductSpec;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryOption extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'category_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
        'category_spec_id' => 'integer'
    ];

    public function categorySpec()
    {
        return $this->belongsTo(CategorySpec::class);
    }

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }

}
