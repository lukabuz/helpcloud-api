<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVoulenteerRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email|unique:voulenteers',
            'profession' => 'required|min:3',
            'country' => 'required',
            'city' => 'required',
            'description' => 'required|min:30',
            'offers.*' => 'exists:offers,id'
        ];
    }
}
