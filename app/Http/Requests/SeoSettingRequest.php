<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoSettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'meta_title'=>'required',
            'meta_author'=>'sometimes',
            'meta_tag'=>'sometimes',
            'meta_description'=>'sometimes',
            'meta_keyword'=>'sometimes',
            'google_verification'=>'sometimes',
            'google_analytics'=>'sometimes',
            'google_adsense'=>'sometimes',
            'alexa_verification'=>'sometimes',
        ];
    }
}
