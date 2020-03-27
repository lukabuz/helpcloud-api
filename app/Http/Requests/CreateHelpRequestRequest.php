<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHelpRequestRequest extends FormRequest
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
            'status' => 'required',
            'message' => 'required|min:20',
            'phone_number' => 'required',
            'voulenteer_id' => 'required|exists:voulenteers,id'
        ];
    }
}
