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
                <h3> <a href="/proposal_details/{{$post->id}}">
                       <h3> {{$post->title}}</h3>
                        <h3> {{$post->summary}}</h3>
                    </a> </h3>
                <small> Submitted on:{{$post->updated_at}}</small>
            </div>
            @endforeach
        @else
        <p>No Proposals Submitted Yet</p>
        @endif

{!! $posts->links() !!}

</body>
</html>


</body>
</html>
@endsection