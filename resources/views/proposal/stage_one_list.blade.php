@extends('layouts.admin')

@section('content')
    <div></div>
    <h3 style="text-align: center; margin-top: auto;">Stage One Proposals</h3>
    @if(count($one)>=1)
        @foreach($one as $ones)
            <div class="well">
                <h3> <a href="/proposal_details/{{$ones->id}}">{{$ones->title}}</a> </h3>
                <small> Submitted on{{$ones->id}}</small>
            </div>
        @endforeach
    @else
        <p>No Proposals in stage one yet</p>
        @endif
</div>
@endsection