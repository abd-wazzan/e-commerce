<?php

namespace App\Http\Requests\Product\Image;

use App\Enums\General\StorageEnum;
use BenSampo\Enum\Rules\EnumValue;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UploadImageRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|mimes:jpg,jpeg,png,jfif',
            'image_type' => 'required',new EnumValue(StorageEnum::class)
        ];
    }

}
