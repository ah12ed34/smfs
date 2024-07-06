<?php

namespace App\Repositories;

use App\Models\AcademicYear;
use App\Models\SubjectsLevels;
class AcademicYRepository
{
    protected  $currentAcademicYear;

    public function __construct()
    {
        $this->currentAcademicYear = AcademicYear::currentAcademicYear();
    }
    public function setAYear($id)
    {
        $this->currentAcademicYear = AcademicYear::findOrfail($id);
    }

    public function getAYear()
    {
        return $this->currentAcademicYear;
    }

    public function getTerm()
    {
        return $this->currentAcademicYear->term;
    }

    public function setTerm($term)
    {
        if (is_numeric($term)) {
            $subjectLevel = SubjectsLevels::where('semester', $term)->first();
            if ($subjectLevel) {
                $this->currentAcademicYear->term = $term;
            }else{
                throw new \Exception(__('sysmass.this_term_is_not_available'));
            }
        }else{
            throw new \Exception(__('sysmass.term_must_be_a_number'));
        }
    }

    public function changeTerm($term)
    {
        $this->setTerm($term);
        $this->currentAcademicYear->save();
    }
}
