@extends('layouts.admin')

@section('script')
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">نمایش نوشته </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.index')}}">
            نمایش نوشته ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.posts.show' , ['post' => $post->id])}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="title">موضوع</label>
                <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control" disabled/>
            </div>

            <div class="mb-3">
                <label class="form-label" for="text">متن</label>
                <textarea name="text" id="text" class="form-control" disabled >{{$post->text}}</textarea>
            </div>

        </form>
    </div>

@endsection
