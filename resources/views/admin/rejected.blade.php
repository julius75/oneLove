@extends('layouts.admin')

@section('content')
    <h1>rejected proposals</h1>
@foreach($twos as $two)
    {{$two->title}}
    @endforeach
    @endsection