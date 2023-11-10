@extends('layouts.admin')

@section('script')
    <script type="module">
        $(function (){
            ClassicEditor.create( document.querySelector( '#text' ) ).catch( error => {
                console.error( error );
            } );
        })
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">ایجاد نوشته </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.index')}}">
            نمایش نوشته ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">

        <form action="{{route('admin.posts.store')}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="title">موضوع</label>
                <input type="text" name="title" id="title" class="form-control" />
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="text">متن</label>
                <textarea name="text" id="text" class="form-control"></textarea>
                @error('text')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="w-100 btn btn-primary mb-4">ارسال</button>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
    </div>
@endsection
