@extends('layouts.home')

@section('script')
@endsection

@section('content')
    <div class="p-3">
        <h2 class="pb-5 text-center">{{$post->title}}</h2>
        <p class="mx-4 mb-3">{{$post->text}}</p>
    </div>
@endsection
