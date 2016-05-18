@extends('_master')

@section('page_title')
    <h2>Editing {{ $animal->name }}'s profile</h2>
@stop


@section('content')

    <form method='POST' action='/animal/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>
        <input type='hidden' name='id' value='{{$animal->id}}'>

        <div class='form-group'>
            <label>Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ $animal->name }}'
            >
        </div>

        <div class='form-group'>
            <label for='sub_species'>Sub Species:</label>
            <select name='sub_species' id='sub_species'>
                <!-- add code to pre-select sub_species in DB -->
                @foreach($animals_for_dropdown as $sub_species)
                    <option value='{{ $sub_species }}' {{ ($animal->sub_species == $sub_species) ? 'SELECTED' : '' }}>
                        {{ $sub_species }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='sex'>Sex: </label>
            <!-- add if/else statment to pre-check either sex -->
                <input type="radio" name="sex" value="male" {{ ($animal->sex == 'male') ? 'checked' : '' }}> Male
                <input type="radio" name="sex" value="female" {{ ($animal->sex == 'female') ? 'checked' : '' }}> Female
        </div>


        <div class='form-group'>
            <label for='bio'>Bio: </label>
                <textarea cols="40" rows="5" name="bio">{{ $animal->bio }}</textarea>
        </div>

        <div class='form-group'>
            <label for='enclosure'>Enclosure: </label>
            <input
                type='text'
                id='enclosure'
                name='enclosure'
                value='{{ $animal->enclosure }}'>
        </div>

        <div class='form-group'>
            <label for='birth_date'>Birth date: </label>
            <input type="date" name="birth_date" value='{{ $animal->birth_date }}'>
        </div>

        <div class='form-group'>
            <label for='care_date'>Care date: </label>
            <input type="date" name="care_date" value='{{ $animal->care_date }}'>
        </div>

        <div class='form-group'>
            <label for='rainbow_date'>Passing date: </label>
            <input type="date" name="rainbow_date" value='{{ $animal->rainbow_date }}'>
        </div>

        <!-- <div class='form-group'>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </div> -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@stop

@section('body')
    {{-- <script src="/js/books/create.js"></script> --}}
@stop
