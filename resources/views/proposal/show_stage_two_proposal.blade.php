@extends('layouts.admin')

@section('content')

    <div></div>
    <h3 style="text-align: center; margin-top: auto;">Stage one</h3>

    <h1>{{$twos->title}}</h1>
<h1> Yoooooo</h1>
    <h1>{{$twos->title}}</h1>
    <p>Auther: {{$twos->email}} </p>
    <div>

        {{$twos->budget}}
        {{$twos->id}}
    </div>
    @if($twos->status=='rejected')

        <a href='{{url("/reject_stage_two/{$twos->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Rejected</a>
    @elseif($twos->status=='not approved')
        <a href='{{url("/reject_stage_two/{$twos->id}")}}' class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" >Reject Proposal</a>
        <a href='{{url("/accept_stage_final/{$twos->id}")}}' class="btn btn-primary btn-lg active" role="button" aria-pressed="true"  name="approve">Accept Proposal</a>
    @elseif($twos->status=='accepted')
        <a href="" class="btn btn-primary btn-lg active ml-3" role="button" aria-pressed="true" name="approve" disabled >Accepted</a>
    @endif

@endsection