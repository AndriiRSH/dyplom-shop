<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'string',
            'description'   => 'string',
            'content'       => 'string',
            'preview_image' => 'file',
            'price'         => 'numeric',
            'category_id'   => 'nullable|exists:categories,id',
        ];
    }
}
