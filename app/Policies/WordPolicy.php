<?php

namespace App\Policies;

use App\User;
use App\Word;
use Illuminate\Auth\Access\HandlesAuthorization;

class WordPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the word.
     *
     * @param  \App\User  $user
     * @param  \App\Word  $word
     * @return mixed
     */
    public function update(User $user, Word $word)
    {
        return $user->id == $word->user_id;
    }
}
