<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TokenGetRequest extends ApiRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->headers->set('Accept', 'application/json');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

}
