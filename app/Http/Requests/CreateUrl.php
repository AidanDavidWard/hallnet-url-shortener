<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUrl extends FormRequest
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
     * Define custom error message list
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'Shortcode is already in use'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => [
                'required',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ],
            'name' => 'sometimes|nullable|unique:shortcodes|min:5|max:15',
            'description' => 'sometimes|max:140',
            'private' => 'sometimes|nullable',
        ];
    }
}
