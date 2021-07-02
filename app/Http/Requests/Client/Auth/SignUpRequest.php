<?php

namespace App\Http\Requests\Client\Auth;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;
use Kouja\ProjectAssistant\Rules\Phone;

class SignUpRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' =>   ['required', 'string', 'min:4', 'max:16'],
            'first_name' => ['required', 'string'],
            'last_name' =>  ['required', 'string'],
            'phone' => ['nullable', 'string', 'min:9', Rule::unique('users', 'phone')]
        ];
    }
}
