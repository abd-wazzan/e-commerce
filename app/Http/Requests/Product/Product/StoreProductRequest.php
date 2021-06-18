<?php

namespace App\Http\Requests\Product\Product;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class StoreProductRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer', 'min:1',
             Rule::exists('categories', 'id')
             ->whereNull('deleted_at')
             ->whereNotNull('category_id')],

            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:10', 'max:1000'],
            'price' => ['required', 'integer', 'min:1', 'max:9999999'],

            'specs' => ['required', 'array'],
            'specs.*.id' => ['required', 'integer', 'min:1'],
            'specs.*.option' => ['required', 'array'],
            'specs.*.option.*' => ['required', 'integer', 'min:1'],

            'img' => ['required', 'image', 'mimes:jpg,jpeg,png,jfif'],
        ];
    }

}
