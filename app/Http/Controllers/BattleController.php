<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Town;
use \App\Barrack;

class BattleController extends Controller
{
    public function attack($offensive, $defensive)
    {
        $offensive = Town::find($offensive);
        $defensive = Town::find($defensive);

        $o_barrack = $offensive->barrack;
        $d_barrack = $defensive->barrack;

        
        if($o_barrack->slagkracht() >= $d_barrack->slagkracht())
        {
            $gold = round($defensive->gold / 100 * 50, 0);
            $food = round($defensive->food / 100 * 60, 0);
            $defensive->gold = $defensive->gold - $gold;
            $defensive->food = $defensive->food - $food;
            $defensive->save();
            $offensive->gold = $offensive->gold + $gold;
            $offensive->food = $offensive->food + $food;
            $offensive->save();

            $offensive->level = $offensive->level + 1;
            $offensive->save();

            $k = rand(0, 10);
            $a = rand(10, 20);
            $f = rand(20, 30);
            $c_k = round(($o_barrack->knights / 100 * (100-$k)), 0);
            $c_a = round(($o_barrack->archers / 100 * (100-$a)), 0);
            $c_f = round(($o_barrack->footmen / 100 * (100-$f)), 0);
            $o_barrack->knights = $c_k;
            $o_barrack->archers = $c_k;
            $o_barrack->footmen = $c_f;
            $o_barrack->save();
            $casulties = array();
            $casulties['knights'] = $c_k;
            $casulties['archers'] = $c_a;
            $casulties['footmen'] = $c_f;

            $success = true;
            $loot = array();
            $loot['gold'] = $gold;
            $loot['food'] = $food;

            return view("battle.after", compact("success", "loot", "casulties"));
        } else {
            $k = rand(20, 30);
            $a = rand(30, 40);
            $f = rand(40, 50);
            $c_k = round(($o_barrack->knights / 100 * (100-$k)), 0);
            $c_a = round(($o_barrack->archers / 100 * (100-$a)), 0);
            $c_f = round(($o_barrack->footmen / 100 * (100-$f)), 0);
            $o_barrack->knights = $c_k;
            $o_barrack->archers = $c_k;
            $o_barrack->footmen = $c_f;
            $o_barrack->save();
            $casulties = array();
            $casulties['knights'] = $c_k;
            $casulties['archers'] = $c_a;
            $casulties['footmen'] = $c_f;

            $defensive->level = $defensive->level + 1;
            $defensive->save();

            $success = false;
            return view("battle.after", compact("success", "casulties"));
        }
    }
}
