<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:5|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric|regex:/^[0-9]+$/',
            'category' => 'required|string|in:hijab,mukena,gamis,abaya',
            'url_shopee' => 'string|url:http,https|nullable',
            'url_tokped' => 'string|url:http,https|nullable',
            'url_wa' => 'required|numeric|regex:/^[0-9]+$/',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:1048|',
            'colors.*' => 'required|string|min:3|max:50',
        ];
        return $rules;
    }
}
