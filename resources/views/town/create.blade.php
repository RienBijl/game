@extends('layouts.app')

@section('content')

    <div class="container">

                <form action="{{ route('town.store') }}" method="POST">
                    @csrf
                    <h1>Halt!</h1>
                    <p>Je wordt aangehouden door soldaten op patrouille. Je vertelt ze dat je de Burgemeester van een stad bent.
                    Ze geloven je niet en willen graag weten hoe je stad heet.
                    </p>
                    <input name="name" type="text" value="{{ (Faker\Factory::create())->city }}"> <br><br>
                    <center>
                        <button class="rpgui-button" type="submit" value="Vraag de Poortwachter om je naar je stad te brengen">Reis verder naar je stad</button>
                    </center>

                </form>

            </div>

@endsection