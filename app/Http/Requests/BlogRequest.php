<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => ['required'],
            'description' => ['required'],
        ];
        return $rules;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str_replace(' ', '-', strtolower($this->title))
        ]);
    }
}
