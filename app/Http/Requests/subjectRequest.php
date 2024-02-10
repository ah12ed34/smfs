<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Level;


class subjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool
    {
        return auth::check() && optional(auth::user())->hasPermission('create-subject');
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
            'subjectname' => ['required','string','max:255'],
            'code' => ['required','string','max:255'],
            'level_id' => ['required','integer','exists:levels,id'],
            'image' => ['required','image' , 'mimes:jpeg,png,jpg'],
            'description' => ['string','max:255','nullable'],
        ];
    }
    public function attributes()
    {
        return [
            'subjectname' => trans('general.subjectname'),
            'code' => __('general.subjectcode'),
            'level_id' => __('general.level'),
            'image' => __('general.image'),

        ];
    }


}
