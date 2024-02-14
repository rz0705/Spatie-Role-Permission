<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $user = $this->user;
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $user ? Rule::unique('users')->ignore($user->id) : ''],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
            'roles' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The :attribute is required.',
            'email.required' => 'The :attribute is required.',
            'email.email' => 'Please enter a valid :attribute address.',
            'email.max' => 'The :attribute must not exceed :max characters.',
            'email.unique' => 'The :attribute has already been taken.',
            'password.required' => 'The :attribute is required.',
            'password.confirmed' => 'The :attribute confirmation does not match.',
            'roles.required' => 'The :attribute is required.'
        ];
    }

    public function attributes(){
        return [
            'name' => __('app.user.name'),
            'email' => __('app.user.email'),
            'password' => __('app.user.password'),
            'password_confirmation' => __('app.user.password_confirmation'),
            'roles' => __('app.user.roles')
        ];
    }
}
