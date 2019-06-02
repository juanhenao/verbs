<?php

namespace App\Policies;

use App\User;
use App\Collection;
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
        $collection = Collection::find($word->collection_id);
        return $user->id == $$collection->user_id;
    }
}
