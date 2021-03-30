<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClinicStoreRequest extends FormRequest
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
            'name' => 'required|string|min:6',
            'name_bn' => 'required',
            'branch_name' => 'nullable',
            'division_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'address_line_1' => 'required|string|max:191',
            'address_line_2' => 'nullable|string|max:191',
            'image' => 'required|string',
            'reception_phone' => 'required|string',
            'location_lat' => 'required|string',
            'location_lng' => 'required|string',
            'services.*' => 'nullable|numeric',
            'surgeries.*' => 'nullable|numeric',
            'test_facilities.*' => 'nullable|numeric',
            'note' => 'nullable|string'
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => 'failed',
            'msg'    => 'New Clinic Registration Failed.',
            'data'   => $validator->errors()
        ], 422));
    }
}
