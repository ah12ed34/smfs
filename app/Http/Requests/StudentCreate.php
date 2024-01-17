<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StudentCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return optional(auth::user())->hasPermission('create-student');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'id'=> ['required','string','max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required','string','max:255','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required','string','max:255','in:male,female'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'department_id' => ['required','integer','exists:departments,id'],
            'level_id' => ['required','integer','exists:levels,id'],

        ];
    }
}
