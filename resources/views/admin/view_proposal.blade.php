@extends('layouts.admin')

@section('content')
        <!DOCTYPE html>
<html>
<head>
    <h3 style="text-align: center; margin-top: auto;">Submitted Proposals</h3>
</head>
<body>

    @if(count($posts)>=1)
        @foreach($posts as $post)
            <div class="well">
                <h3> <a href="/proposal_details/{{$post->id}}">{{$post->email}}</a> </h3>
                <small> Submitted on{{$post->id}}</small>
            </div>
            @endforeach
        @else
        <p>No Proposals Submitted Yet</p>
        @endif

</body>
</html>


</body>
</html>
@endsection