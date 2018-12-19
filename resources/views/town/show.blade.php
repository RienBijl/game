@extends('layouts.app')

@section('content')
    @if($town == null)
        <div class="container">
            Wat moet je, deze town bestaat niet gekkie
        </div>
    @else
        <div class="container">

            <div class="rpgui-container framed fw">
                <h1>{{ $town->name }}</h1>
                <p>
                    <b>Level: </b> {{$town->level}} <b>Gold: </b> <span id="gold">{{ $town->gold }}</span> <b>Food: </b> <span id="food">{{ $town->food }}</span>
                    @if($town->id == Auth::user()->town->id)
                        <br>Jij bent Burgemeester van deze Stad. Je bent nu belastingen aan het innen.
                        <form id="csrf">@csrf</form>
                        <script>
                            window.setInterval(function(){

                                $.ajax({
                                    url: "{{url('town/' . Auth::user()->town->id)}}",
                                    type: 'PUT',
                                    data: $("#csrf").serialize(),
                                    success: function(result) {
                                        let gold = $("#gold");
                                        let food = $("#food");
                                        let _gold = parseInt(gold.html());
                                        let _food = parseInt(food.html());
                                            gold.html(_gold + 3);
                                            food.html(_food + 2);
                                    }
                                });
                            }, 5000);
                        </script>
                    @endif
                </p>
            </div>

            @if($town->id == Auth::user()->town->id)
                <div class="row">
                    <div class="col-md-4">
                        <div class="rpgui-container framed fw">
                            <h3>Barakken</h3>
                            <p>Onderhoud je leger voor defensieve en offensieve punten</p>
                            <button onclick="location.href = '{{url('barrack/' .Auth::user()->town->barrack->id)}}'" class="rpgui-button">Ga naar de stadsbarakken</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="rpgui-container framed fw">
                    <h3>Actie uitvoeren</h3>
                    <button class="rpgui-button" onclick="location.href = '{{ url('battle') }}/{{Auth::user()->town->id}}/{{$town->id}}'">Aanvallen</button>
                </div>
            @endif

        </div>
    @endif
@endsection