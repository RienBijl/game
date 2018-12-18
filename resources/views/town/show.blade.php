@extends('layouts.app')

@section('content')
    @if($town == null)
        <div class="container">
            Wat moet je, deze town bestaat niet gekkie
        </div>
    @else
        <div class="container">

            <div class="rpgui-container framed fw">
                <h3>{{ $town->name }}</h3>
                <p>
                    <b>Level: </b> {{$town->level}} <b>Gold: </b> {{ $town->gold }} <b>Food: </b> {{ $town->food }}
                    @if($town->id == Auth::user()->town->id)
                        <br>Jij bent Burgemeester van deze Stad
                    @endif
                </p>
            </div>

        </div>
    @endif
@endsection