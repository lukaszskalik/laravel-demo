@extends('layouts.app')

@section('content')

    <form action="{{route('sites.save')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Podaj tytul">
        </div>
        <div class="form-group">
            <span>
                <input  type="file"
                        style="visibility:hidden; width: 1px;"
                        name="img"
                        onchange="$(this).parent().find('span').html($(this).val().replace('C:\\fakepath\\', ''))"  /> <!-- Chrome security returns 'C:\fakepath\'  -->
                        <input class="btn btn-primary" type="button" value="Wybierz plik..." onclick="$(this).parent().find('input[type=file]').click();"/> <!-- on button click fire the file click event -->
                        &nbsp;
                <span  class="badge badge-important" ></span>
            </span>
        </div>



        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="Podaj tresc">

            </textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">
                Zapisz
            </button>
        </div>
    </form>

@endsection