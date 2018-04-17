{{--@extends('layouts.app')

@section('contents')--}}
    <div class="alert alert-primary">
        {{$msg}}<br/>
    </div>

    <div class="info_wrapper">
        Name:{{$user->name}}<br/>
        Province :{{$user->province->name}}<br/>
        Telephone :{{$user->telephone}}<br/>
        Postal:{{$user->postal}}<br/>
        Salary:{{$user->salary}}
    </div>
{{--@endsection--}}