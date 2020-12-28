<?php

namespace App\Http\Requests\Designation;

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
            'name' => 'required|string',
            'name_bn' => 'nullable|string',
            'description' => 'nullable|min:5',
            'description_bn' => 'nullable|min:5',
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => 'failed',
            'msg'    => 'New Designation Registration Failed.',
            'data'   => $validator->errors()
        ], 422));
    }
}
