<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|min:2|max:20",
            "lastname"=>"required|min:5|max:20",
            "score"=>"required|numeric|min:5|max:100",
            "age"=>"required|numeric|min:12|max:50",
            "gender"=>"required|in:m,f",
            "image"=>"nullable|image|mimes:jpg,png,jpeg,gif|max:4096"
        ];
    }
    public function messages(){
        return[
            
            "name.required"=>"you must enter your name",
            "name.min"=>"your name must be at least 2 charachters",
            "name.max"=>"your name must not be more than 20 charachters"
        ];
    }
}
