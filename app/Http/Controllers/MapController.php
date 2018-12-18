<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Town;

class MapController extends Controller
{
    
    public function index()
    {
        $maps = array();
        for($i = 0; $i<3;$i++)
            $maps[$i] = Town::find(rand(1, Town::count()));
        $locations = $this->getRandomLocation();

        return view('map.index', compact('maps', 'locations'));
    }

    private function getRandomLocation()
    {
        $num = rand(1,5);
        $locations = array();
        switch($num)
        {
            case 1:
                $locations[0] = "margin-top: 6em;margin-left: 8em;";
                $locations[1] = "margin-top: 13em;margin-left: 30em;";
                $locations[2] = "margin-top: 28em;margin-left: 7em;";
                break;
            case 2:
                $locations[0] = "margin-top: 9em;margin-left: 12em;";
                $locations[1] = "margin-top: 17em;margin-left: 36em;";
                $locations[2] = "margin-top: 25em;margin-left: 3em;";
                break;
            case 3:
                $locations[0] = "margin-top: 6em;margin-left: 8em;";
                $locations[1] = "margin-top: 13em;margin-left: 30em;";
                $locations[2] = "margin-top: 28em;margin-left: 7em;";
                break;
            case 4:
                $locations[0] = "margin-top: 20em;margin-left: 30em;";
                $locations[1] = "margin-top: 30em;margin-left: 9em;";
                $locations[2] = "margin-top: 15em;margin-left: 7em;";
                break;
            case 5:
                $locations[0] = "margin-top: 5em;margin-left: 17em;";
                $locations[1] = "margin-top: 25em;margin-left: 10em;";
                $locations[2] = "margin-top: 32em;margin-left: 28em;";
                break;
        }
        return $locations;
    }

}
