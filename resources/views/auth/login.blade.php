@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="rpgui-container framed fw">

                    <h1>Inloggen</h1>

                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <input placeholder="Mail adres" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                        <input placeholder="Wachtwoord" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                        <center><br><button type="submit" class="rpgui-button">
                            Inloggen
                        </button>
                            <p><a href="{{route("register")}}">Ik ben nieuw hier</a></p></center>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
