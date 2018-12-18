@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="rpgui-container framed fw">
            <p>Een reiziger heeft je deze kaart gegeven, je mag hem lenen om een route naar een andere stad uit te stippelen. Hij wil hem hierna wel weer terug.</p>
            <br><br>
            <center><button onclick=' location.href="{{url('map')}}"' class="rpgui-button">Vraag een nieuwe kaart</button></center>

        </div>
        <br>
        <div class="rpgui-container framed fw">
        <div style="background-image: url({{ asset('img/map.jpg') }};  width: 100%; height: 45em;">

            @for($i=0;$i<3;$i++)
                <div class="">
                    {{--<div class="tooltiptext">--}}
                        {{--<b>{{$maps[$i]->name}}</b><br>Level: {{$maps[$i]->level}}<br><hr>Deze stad wordt bestuurd door {{$maps[$i]->user->name}}--}}
                    {{--</div>--}}
                    <div style="
                        position: absolute;
                        cursor: pointer;
                        {{$locations[$i]}}
                            "
                         onclick="location.href = '{{url('town/' .$maps[$i]->id)}}'"
                    >
                        <center><img src="{{asset('img/town.png')}}" height="100em" alt=""></center>
                        <p>{{$maps[$i]->name}}<br>Level: {{$maps[$i]->level}}</p>
                    </div>
                </div>
            @endfor

        </div>
        </div>

    </div>
@endsection