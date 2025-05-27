<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public function publisher() {
    return $this->belongsTo(Publisher::class);
}

public function developers() {
    return $this->belongsToMany(Developer::class);
}

}
