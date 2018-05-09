<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $name = ['name'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
