@extends('layouts.home')

@section('scripts')
@endsection

@section('content')
    <div class="pt-5">
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @elseif(session()->has('email'))
            <div class="alert alert-danger">
                {{ session('email') }}
            </div>
        @endif
        <p class="fs-4 text-center">ایمیلتان را وارد کنید.</p>
        <div class="mt-5 d-flex justify-content-center">
            <form action="{{route('password.email')}}" method="post" class="w-25">
                @csrf
                <diV class="mb-3">
                    <label for="email" class="form-label">ایمیل</label>
                    <input type="email" name="email" id="email" class="form-control">
                </diV>
                <button type="submit" class="w-100 btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
@endsection
