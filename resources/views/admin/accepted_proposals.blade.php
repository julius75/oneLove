@extends('layouts.admin')

@section('content')
    <h1>Accepted proposals</h1>
@foreach($twos as $two)
    {{$two->title}}
    @endforeach
    @endsection