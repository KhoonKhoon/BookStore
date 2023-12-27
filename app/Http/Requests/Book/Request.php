<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
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
        $rules = [
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'photo' => 'required|image|mimes:png,jpg,gif,svg|max:2048',
        ];

        return $rules;
    }
}
