<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrack extends Model
{
    public function town()
    {
        return $this->belongsTo('\App\Town');
    }

    public function slagkracht()
    {
        $knights = $this->knights * 3;
        $archers = $this->archers * 2;
        $footmen = $this->footman * 1;
        return $knights + $archers + $footmen;
    }
}
