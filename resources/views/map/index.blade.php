@extends('layouts.app')

@section('content')

    <div class="container">

        <div style="background-color: green; width: 100%; height: 40em;">
            
            <div style="margin-top: {{ rand(1, 30) }}em; margin-left: {{ rand(1, 30) }}em; width: 3em; height: 3em; background-color: grey; position: absolute;"
            <?php $town1 = \App\Town::find(rand(1, App\Town::count())) ?>
            data-toggle="tooltip" data-placement="top" title="{{ $town1->name }}"
            onclick="location.href = '{{ url('town/' .$town1->id) }}'"
            ></div>
            <div style="margin-top: {{ rand(1, 30) }}em; margin-left: {{ rand(1, 30) }}em; width: 3em; height: 3em; background-color: grey; position: absolute;"
            <?php $town2 = \App\Town::find(rand(1, App\Town::count())) ?>
            onclick="location.href = '{{ url('town/' .$town2->id) }}'"
            data-toggle="tooltip" data-placement="top" title="{{ $town2->name }}"
            ></div>

        </div>

    </div>

@endsection