@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Je hebt nog geen Stad!</div>
            <div class="card-body">

                <form action="{{ route('town.store') }}" method="POST">
                    @csrf
                    <b>Geef je Stad een naam</b>
                    <p>We hebben al wat bedacht, maar die naam hoef je niet te kiezen.</p>
                    <input name="name" type="text" value="{{ (Faker\Factory::create())->city }}" class="form-control">
                    <hr>
                    <input type="submit" value="Vraag de Poortwachter om je naar je stad te brengen" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>

@endsection