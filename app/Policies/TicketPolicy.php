<?php

namespace app\Policies;

use app\Model\Ticket;
use app\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id;
    }
}
