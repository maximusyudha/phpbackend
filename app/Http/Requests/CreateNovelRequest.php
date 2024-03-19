<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNovelRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set ke true jika tidak memerlukan otentikasi
    }

    public function rules()
    {
        return [
            'page_count' => 'required|integer',
            'publish_date' => 'required|date',
            'isbn' => 'required|string|unique:books,isbn',
            'language' => 'required|string',
            'publisher' => 'required|string',
            'weight' => 'required|numeric',
            'width' => 'required|numeric',
            'length' => 'required|numeric',
            'price' => 'required|numeric',
        ];
    }
}
