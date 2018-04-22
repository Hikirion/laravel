<?php

namespace App\Repositories;

use App\User;

class TicketRepository
{
     /*
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->ticket()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}