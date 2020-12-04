<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'name_company' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'tell' => 'required',
            'url_company' => 'required',
            'url_pr' => 'required',
            'body_pr' => 'required',
            'price' => 'required'
           
        ];
    }
}
