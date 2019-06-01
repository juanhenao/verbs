<?php

namespace App\Policies;

use App\User;
use App\Collection;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollectionPolicy
{
    /**
     * Determine whether the user can update the = collection.
     *
     * @param  \App\User  $user
     * @param  \App\=Collection  $=Collection
     * @return mixed
     */
    public function update(User $user, Collection $collection)
    {
        return $user->id == $collection->user_id;
    }
}
