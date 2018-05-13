<?php

namespace app\Repositories;

use app\User;

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

    public function forCategoriesUser(User $user, $categoryId)
    {
        return $user->ticket()
            ->where('category_id', '=', $categoryId)
            ->orderBy('created_at', 'asc')
            ->get();
    }
    public function getSearch(User $user, $query)
    {
        return $user->ticket()
        ->where('title', 'like', '%'.$query.'%')
        ->orWhere('body', 'like', '%'.$query.'%')
        ->get();

    }
}