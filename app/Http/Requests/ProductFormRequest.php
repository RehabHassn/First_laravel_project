<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
    public function my_rules(){
        $arr =[
            'name' => 'required',
            'price' => 'required',
            'info' => 'required',
        ];
        if($this->getRequestUri()=='/products'){
            $arr['images'] = 'required';
            $arr['images.*'] = 'required'|'mimes:jpeg,jpg,png,gif';
        }
        return $arr;
    }
    public function rules(): array
    {
        return $this->my_rules();
    }
}
