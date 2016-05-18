@extends('_master')

@section('head')
    {{-- <link href="/css/books/create.css" type='text/css' rel='stylesheet'> --}}
@stop

@section('page_title')
    <h2>Add an Animal</h2>
@stop

@section('content')

    <form method='POST' action='/animal/create'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label>Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ old('name','Tabula') }}'
            >
        </div>

        <div class='form-group'>
            <label for='sub_species'>Sub Species:</label>
            <select name='sub_species' id='sub_species'>
                @foreach($animals_for_dropdown as $sub_species)
                    <option value='{{ $sub_species }}'> {{ $sub_species }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='sex'>Sex: </label>
                <input type="radio" name="sex" value="male"> Male
                <input type="radio" name="sex" value="female"> Female
        </div>


        <div class='form-group'>
            <label for='bio'>Bio: </label>
                <textarea cols="40" rows="5" name="bio"></textarea>
        </div>

        <div class='form-group'>
            <label for='enclosure'>Enclosure: </label>
            <input
                type='text'
                id='enclosure'
                name='enclosure'>
        </div>

        <div class='form-group'>
            <label for='birth_date'>Birth date: </label>
            <input type="date" name="birth_date">
        </div>

        <div class='form-group'>
            <label for='care_date'>Care date: </label>
            <input type="date" name="care_date">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>

@stop

@section('body')
    {{-- <script src="/js/books/create.js"></script> --}}
@stop
