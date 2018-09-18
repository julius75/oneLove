@extends('layouts.admin')

@section('content')
@foreach($proposal as $proposals)
    {{$proposals->title}}
    @endforeach
    @endsection