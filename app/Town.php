<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function barrack()
    {
        return $this->hasOne('\App\Barrack');
    }

}
