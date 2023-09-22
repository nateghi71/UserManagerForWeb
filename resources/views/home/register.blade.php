@extends('layouts.home')

@section('scripts')
@endsection

@section('content')
    <div class="d-flex justify-content-center pt-5">
        <form action="{{route('home.register.register')}}" method="post" class="w-25 bg-light p-4 rounded-4">
           @csrf
            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="name" name="name" id="name" class="form-control" />
            </div>

            <!-- Email input -->
            <div class="mb-3">
                <label class="form-label" for="email">ایمیل</label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="mb-4">
                <label class="form-label" for="password">کلمه عبور</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="mb-4">
                <label class="form-label" for="confirm-password">تکرار کلمه عبور</label>
                <input type="confirm-password" name="confirm-password" id="confirm-password" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="button" class="w-100 btn btn-primary mb-4">ثبت نام</button>

            <div class="text-center">
                <!-- Register buttons -->
                <p>عضو هستم؟ <a href="{{route('home.logInOut.index')}}" class="text-decoration-none">ورود</a></p>
            </div>

        </form>
    </div>
@endsection
