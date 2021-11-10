<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
 
class ValidateRequests extends FormRequest
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
            'user_id' => ['required','numeric'],
            'item' => ['required', 'max:255'],
            'price' => ['required','numeric'],
            'vat' => ['required', 'numeric'],
            'desc' => ['sometimes', 'max:255'],
            'type' => ['required'],
            'file' => ['required', 'file', 'mimes:jpeg,bmp,png,jpg', 'max:2048'],
        ];
    }
}
