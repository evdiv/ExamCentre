<?php

namespace App\Policies;

use App\User;
use App\Evaluation;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvaluationPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Evaluation $evaluation)
    {
        return $user->id == $evaluation->lesson->user_id;
    }
}
