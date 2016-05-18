@extends('_master')

@section('header')
  <h1>Meet CARE's Tigers</h1>
@stop



@section('content')

@foreach($animals as $animal)
    <div>
        <h2>{{ $animal->name }}</h2>
        <img src="{{ $animal->image }}" />
    </div>
@endforeach

@stop
