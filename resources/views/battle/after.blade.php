@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="rpgui-container framed fw">
            @if($success == true)
            <h1>Overwinning!</h1>
            <p>
                Je troepen hebben goed gevochten.
                Je wint {{$loot['gold']}} goud en {{$loot['food']}} food.
            </p>
            @else
                <h1>Nederlaag</h1>
                Je troepen hebben hun best gedaan, maar verlies was onvermijdbaar.
            @endif
            <p>
                    <br><b>Slachtoffers: </b> <br>
                    Ridders: {{$casulties['knights']}} <br>
                    Boogschutters: {{$casulties['archers']}} <br>
                    Infanterie: {{$casulties['footmen']}}
            </p>
        </div>
    </div>

@endsection