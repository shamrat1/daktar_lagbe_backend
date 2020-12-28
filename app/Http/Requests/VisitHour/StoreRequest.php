<?php

namespace App\Http\Requests\VisitHour;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'days' => "required|string",
            'from' => "required|string",
            'to' => "required|string",
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => 'failed',
            'msg'    => 'New Visiting Hour Registration Failed.',
            'data'   => $validator->errors()
        ], 422));
    }
}
