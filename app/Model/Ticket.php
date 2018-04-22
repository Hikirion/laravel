<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
