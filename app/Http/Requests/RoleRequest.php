<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'permissions' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The :attribute is required.',
            'permissions.required' => 'The role name requires permission.',
        ];
    }

    public function attributes(){
        return [
            'name' => __('app.role.name'),
        ];
    }
}
