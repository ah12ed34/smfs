<?php

namespace App\Contracts;

interface SubjectsInterface
{
    public function getSubjects();
    public function getSubject($id);
    public function createSubject($data);
    public function updateSubject($id, $data);
    public function deleteSubject($id);

}
