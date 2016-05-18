@extends('_master')

@section('page_title')
    <h2>{{ $animal->name }}</h2>
    <h3>{{ $animal->sub_species }}</h3>
    <a href='/animal/edit/{{ $animal->id }}'>Edit {{ $animal->name }}'s profile</a>

@stop

@section('content')
    <div class="profile">
        <div class="section group">
            <div class="profile_pic col span_1_of_3">
                <img class="" src="{{ $animal->image }}" />
            </div>
            <div class="col span_2_of_3">

                <h3>{{ $animal->name }}</h3>
                <h5>{{ $animal->sex }}</h5>
                <p><span class="animeta">Birth Date: </span>{{ $animal->birth_date }}
                <p><span class="animeta">Arrival Date at CARE: </span>{{ $animal->care_date }}
                <p><span class="animeta">Rainbow bridge: </span>{{ $animal->rainbow_date }}
                <p><span class="animeta">Adoptive Parents: </span>
                <p><span class="animeta">sponsors: </span>
            </div>
        </div>
        <div class="section group">
            <div class="col span_3_of_3">
                <p>{{ $animal->bio }}</p>
            </div>
        </div>
        <div class="section group">
            <div class="col span_3_of_3">
                <h3> More pictures of {{ $animal->name }}</h3>
                <img src="{{ $animal->image }}" />
                <img src="{{ $animal->image }}" />
                <img src="{{ $animal->image }}" />
            </div>
        </div>
        <div class="section group">
            <div class="col span_3_of_3">
                <h3> Uploaded images of {{ $animal->name }}</h3>
                <img src='./img/babyLion1.jpg' />
            </div>
        </div>

    </div>


<h4>Meet the rest of the <a href="/animals/{{ $animal->sub_species }}">{{ $animal->sub_species }}s</a>.</h4>


@stop
