<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class groupRQ extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check()&& optional(Auth::user())->hasPermission('add_group');
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
            'groupname'  => ['required','string','max:255'],
            'level' => ['required','integer','exists:levels,id'],
            'parent_group' => ['integer','exists:groups,id','nullable'],
            'table_file' => ['nullable','file','mimes:pdf,png,jpg,jpeg'],
            'maxstudent' => ['required','integer','max:255'],

        ];
    }
    public function attributes()
    {
        return[
            'groupname' => __('general.groupname'),
            'level_id' => __('general.level'),
            'parent_group' => __('general.group'),
            'table_file' => __('general.schedule'),
            'maxstudent' => __('general.maxstudent'),
        ];
    }
}
