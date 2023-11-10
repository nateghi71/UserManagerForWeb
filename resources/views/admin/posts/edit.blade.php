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
        <form action="{{route('admin.posts.update' , ['post' => $post->id])}}" method="post" class="w-50">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label" for="title">موضوع</label>
                <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control" />
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="text">متن</label>
                <textarea name="text" id="text" class="form-control">{{$post->text}}</textarea>
                @error('text')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="w-100 btn btn-primary mb-4">ویرایش</button>

        </form>
    </div>

@endsection
