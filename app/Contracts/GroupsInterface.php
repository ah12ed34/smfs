<?php

namespace App\Contracts;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface GroupsInterface
{
    public function getGroupsByLevel($level): Collection;
    public function getGroupById($id): Group;

}
