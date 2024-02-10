<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class add_students implements ValidationRule
{
    protected $group;
    function __construct($group)
    {
        $this->group = $group;
    }

    public function passes($attribute, $value)
    {
        $group = $this->group;
        $max = $group->max_students;
        $count = $group->students->count();
        if($count + sizeof($value) > $max){
            return false;
        }
        return true;
    }

    public function message()
    {
        return __('general.maxstudent');
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->passes($attribute, $value)) {
            $fail($this->message());
        }else{
            foreach ($value as $key => $id) {
                if($this->group->students->contains($id)){
                    continue;
                }else{
                    $student = \App\Models\Student::where('user_id',$id)->first();
                    if($student){
                        if($student->level_id == $this->group->level_id){
                            continue;
                        }else{
                            $fail(__('general.student_not_in_level'));
                        }
                    }else{
                        $fail(__('general.student_not_found'));
                    }
                }
            }
        }
    }
}
