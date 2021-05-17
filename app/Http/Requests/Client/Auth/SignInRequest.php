<?php

namespace App\Http\Requests\Client\Auth;

use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class SignInRequest extends BaseFormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required','email'],
            'password' => ['required','string','min:4','max:16']
        ];
    }

}
