<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReadRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'craw_id' => ['required', 'integer', 'exists:craws,id'],
            'notification_id' => ['required', 'integer', 'exists:notifications,id'],
        ];
    }
}
