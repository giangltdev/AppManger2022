<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OderRequest extends FormRequest
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
     * @return arrayphp
     */
    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Không được để trống nội dung yêu cầu',
        ];
    }

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
