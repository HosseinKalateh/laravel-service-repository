<?php

namespace App\Http\Requests\admin\post;

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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'category_id' => 'required|exists:categories,id',
            'tags_id' => 'required|array'
        ];
    }

    public function attributes()
    {
        return [
            'tags_id' => 'tags',
            'category_id' => 'category'
        ];
    }
}
