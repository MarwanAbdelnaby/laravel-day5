<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
    public function rules() : array
{
    return [
        'name' => 'required|min:4|max:12',
        'price' =>['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        'description' => 'required|string|max:10',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ];
}

}
