<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNovelRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set ke true jika tidak memerlukan otentikasi
    }

    public function rules()
    {
        return [
            'page_count' => 'sometimes|required|integer',
            'publish_date' => 'sometimes|required|date',
            'isbn' => 'sometimes|required|string|unique:books,isbn,' . $this->book->id,
            'language' => 'sometimes|required|string',
            'publisher' => 'sometimes|required|string',
            'weight' => 'sometimes|required|numeric',
            'width' => 'sometimes|required|numeric',
            'length' => 'sometimes|required|numeric',
            'price' => 'sometimes|required|numeric',
        ];
    }
}
