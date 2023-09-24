@extends('layouts.admin')

@section('script')
    <script type="module">
        $(function (){
            ClassicEditor.create( document.querySelector( '#content' ) ).catch( error => {
                console.error( error );
            } );
        })
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">ویرایش نوشته </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.index')}}">
            نمایش نوشته ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.posts.edit' , ['post' => $post->id])}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="title">موضوع</label>
                <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="content">متن</label>
                <textarea name="content" id="content" class="form-control">{{$post->content}}</textarea>
            </div>

            <button type="button" class="w-100 btn btn-primary mb-4">ویرایش</button>

        </form>
    </div>

@endsection
