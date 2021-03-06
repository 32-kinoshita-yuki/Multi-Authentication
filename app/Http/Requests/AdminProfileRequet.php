<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'tell' => 'required',
            'name' => 'required',
            'address' => 'required',
            'name_company' => 'required',
            'url_company' => 'required',
            'url_pr' => 'required',
            'body_pr' => 'required',
            'price' => 'required'
        ];
    }
}
