<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
