@extends('_master')

@section('page_title')
    <h2>Meet CARE's {{ isset($animal_sub_species) ? $animal_sub_species."s" : 'Family' }}</h2>
@stop

@section('content')
    <?php $count = 0; ?>
    @foreach($animals as $animal)
        @if($count % 4 == 0)
            <div class="section group">
        @endif
            <div class="animal col span_1_of_4">
                <h2>{{ $animal->name }}</h2>

                <a href="/animals/show/{{ $animal->id }}">see more</a>
                <img src="{{ $animal->image }}" />
                <h4>{{ $animal->sub_species }}</h4>
                <?php $count++; ?>
            </div>
        @if($count % 4 == 0)
            </div>
        @endif
    @endforeach
@stop
