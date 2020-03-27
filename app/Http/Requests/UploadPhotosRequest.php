<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhotosRequest extends FormRequest
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

        $rules = [];
        $images = count(request('images'));
        foreach(range(0, $images) as $image) {
            $rules['images-' . $image] = 'image|mimes:jpeg,bmp,png|max:2000';
        }
        
        return $rules;
    }
}
