<?php

namespace App\Policies;

use App\User;
use App\Lesson;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Lesson $lesson)
    {
        return $user->id == $lesson->user_id;
    }

}
