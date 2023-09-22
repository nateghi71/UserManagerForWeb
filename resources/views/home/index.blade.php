@extends('layouts.home')

@section('script')
    <script type="module">
        $(function (){
            let posts = @json($posts);
            posts.data.forEach(function (post){
                let text = $('#summaryText-' + post.id).text();
                $('#summaryText-' + post.id).text(text.slice(0,20))
            })
        })
    </script>
@endsection

@section('content')
    @foreach($posts as $post)
    <div class="m-3">
        <h2 class="pb-2">{{$post->title}}</h2>
        <p id="summaryText-{{$post->id}}" class="w-25">{{$post->content}}</p>
        <a href="{{route('home.show' , ['post' => $post->id])}}" class="text-decoration-none text-primary"> ادامه مطلب ... </a>
        <hr>
    </div>
    @endforeach

    {{$posts->links()}}
@endsection
