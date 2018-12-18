@extends("layouts.app")

@section('content')

    <div class="container">
        <div class="rpgui-container framed fw">
            <p>Goud: {{Auth::user()->town->gold}} Eten: {{Auth::user()->town->food}}</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="rpgui-container framed fw">
                    <h1>Train nieuwe troepen</h1>
                    <form action="{{route("barrack.store")}}" method="post">
                        @csrf
                        <label for="">Aantal Ridders (40 goud, 60 eten p.s.)</label>
                        <input value="0" type="number" name="knights">
                        <label for="">Aantal Boogschutters (30 goud, 50 eten p.s.)</label>
                        <input value="0" type="number" name="archers">
                        <label for="">Aantal Infanterie (20 goud, 40 eten p.s.)</label>
                        <input value="0" type="number" name="footmen">
                        <button class="rpgui-button fw">Train troepen</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="rpgui-container framed fw">
                    <h1>Garnizoen</h1>
                    <p>
                        <b>Ridders: </b> {{Auth::user()->town->barrack->knights}} (3 slagkracht)<br>
                        <b>Boogschutters: </b> {{Auth::user()->town->barrack->archers}} (2 slagkracht)<br>
                        <b>Infanterie: </b> {{Auth::user()->town->barrack->footmen}} (1 slagkracht)<br><br>
                        <b>Totale slagkracht: </b> {{Auth::user()->town->barrack->slagkracht()}}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection