<?php

namespace App\Http\Requests\User;

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
        $user_id = request()->user ? request()->user->id : null;
        $data['password'] = 'required|min:8|confirmed';

        if($user_id){
            $data['password'] = 'nullable|min:8|confirmed';
        }

        $rules = [
            'name' => 'required|regex:/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/|max:255',
            'email' => 'required|email|unique:users,email,'.$user_id,
            // 'photo' => 'required|image|mimes:jpeg,png|max:2048'
        ]+$data;

        return $rules;
    }
}
