<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zipCode' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'buildingNumber' => ['required', 'integer'],
            'apartmentNumber' => ['required', 'integer'],
            'position_id' => ['required', 'integer', 'max:255'],
            'dateOfBirth' => ['required', 'date', 'max:255'],
            'hireDate' => ['required', 'date', 'max:255']
        ];
    }
}
