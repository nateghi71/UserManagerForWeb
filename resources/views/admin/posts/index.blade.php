@extends('layouts.admin')

@section('script')
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">لیست نوشته ها </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.posts.create')}}">
            ایجاد نوشته
        </a>
    </div>
    <div>
        <table class="table table-bordered table-striped text-center">

            <thead>
            <tr>
                <th>#</th>
                <th>موضوع</th>
                <th>نویسنده</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <th>
                        {{ $posts->firstItem() + $key }}
                    </th>

                    <th>
                        <a href="{{ route('admin.posts.show', ['post' =>$post->id]) }}" class="text-decoration-none">{{$post->title}}</a>
                    </th>
                    <th>
                        {{$post->user_id}}
                    </th>
                    <th>
                        <a href="{{ route('admin.posts.edit', ['post' =>$post->id]) }}" class="btn btn-sm btn-outline-primary">ویرایش</a>
                    </th>
                    <th>
                        <form action="{{route('admin.posts.destroy', ['post' =>$post->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{$posts->withQueryString()->links()}}

@endsection
