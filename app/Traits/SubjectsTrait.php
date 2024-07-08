<?php
namespace App\Traits;

use App\Models\Subject;
use App\Repositories\SubjectsRepository;

trait SubjectsTrait{

    public $subjectData;

    protected $SubjectsR;

    public $code;
    public $name_ar;
    public $name_en;
    public $image;


    public $SL_id;
    public $SL_level_id;
    public $SL_subject_id;
    public $SL_semester;
    public $SL_has_practical;
    public $SL_is_active;


    public $GS_id;
    public $GS_group_id;
    public $GS_subject_id;
    public $GS_teacher_id;
    public $GS_ay_id;
    public $GS_is_practical;




    public function initializeSubjects(){
        $this->SubjectsR = new SubjectsRepository();
    }

    public function selectedS($id){
        $this->subjectData = Subject::findOrFail($id);
    }

    public function showSubject($id){
        $this->selectedS($id);
    }

    public function resetSubject(){
        $this->code = '';
        $this->name_ar = '';
        $this->name_en = '';
        $this->image = '';

        $this->SL_id = '';
        $this->SL_level_id = '';
        $this->SL_subject_id = '';
        $this->SL_semester = '';
        $this->SL_has_practical = '';
        $this->SL_is_active = '';

        $this->GS_id = '';
        $this->GS_group_id = '';
        $this->GS_subject_id = '';
        $this->GS_teacher_id = '';
        $this->GS_ay_id = '';
        $this->GS_is_practical = '';

        $this->subjectData = null;
    }




}
