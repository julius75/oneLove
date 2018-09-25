@extends('layouts.admin')

@section('content')

    <div></div>
    <h3 style="text-align: center; margin-top: auto;">Stage one</h3>

    <h1>{{$ones->title}}</h1>
<h1> Yoooooo</h1>
    <h1>{{$ones->title}}</h1>
    <p>Auther: {{$ones->email}} </p>
    <div>

        {{$ones->budget}}
        {{$ones->id}}
    </div>
    @if($ones->status=='rejected')

        <a href='{{url("/reject_stage_one/{$ones->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Rejected</a>
    @elseif($ones->status=='not approved')
        <a href='{{url("/reject_stage_one/{$ones->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" >Reject Proposal</a>
        <a href='{{url("/accept_stage_two/{$ones->id}")}}' class="btn btn-primary btn-lg active" role="button" aria-pressed="true"  name="approve">Accept Proposal</a>
    @elseif($ones->status=='accepted')
        <a href="" class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Accepted</a>
    @endif

@endsection