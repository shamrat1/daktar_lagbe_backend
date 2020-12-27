<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DoctorStoreRequest extends FormRequest
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
            'division_id' => 'required',
            'city_id' => 'required',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'name' => 'required|string|min:4',
            'name_bn' => 'nullable|string|min:4',
            'bmdc_code' => 'nullable|string|unique:doctors',
            'department_id' => 'required|numeric',
            'expertise_id' => 'required|numeric',
            'designation_id' => 'required|numeric',
            'extra_fee' => 'nullable|numeric',
            'phone' => 'nullable|numeric|min:11',
            'note' => 'nullable|numeric|min:11',
            'visiting_hours' => 'required',
            'visiting_fees' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => 'failed',
            'msg'    => 'New Doctor Registration Failed.',
            'data'   => $validator->errors()
        ], 422));
    }
}
