@extends('layouts.app')

@section('content')
    @if($town == null)
        <div class="container">
            Wat moet je, deze town bestaat niet gekkie
        </div>
    @else
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <h3>{{ $town->name }}</h3>
                    <b>Level: </b> {{$town->level}} <b>Gold: </b> {{ $town->gold }} <b>Food: </b> {{ $town->food }}
                    @if($town->id == Auth::user()->town->id)
                    <br>Jij bent Burgemeester van deze Stad
                    @endif
                </div>
            </div>

        </div>
    @endif
@endsection