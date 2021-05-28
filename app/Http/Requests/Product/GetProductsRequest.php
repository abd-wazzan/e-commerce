<?php

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class GetProductsRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cat' => ['nullable','integer',Rule::exists('categories','id')->whereNull('category_id')],
            'sub' => ['nullable','integer',Rule::exists('categories','id')->whereNotNull('category_id')],
            'min_price' => ['nullable','numeric'],
            'max_price' => ['nullable','numeric'],
            'info' => ['nullable','string'],
            'filter' => ['nullable','array'],
            'filter.*' => ['integer'],
        ];
    }

}
