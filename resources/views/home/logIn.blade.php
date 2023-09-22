@extends('layouts.home')

@section('scripts')
@endsection

@section('content')
    <div class="d-flex justify-content-center pt-5">
        <form action="{{route('home.logInOut.logIn')}}" method="post" class="w-25 bg-light p-4 rounded-4">
            @csrf
            <!-- Email input -->
            <div class="mb-3">
                <label class="form-label" for="email">ایمیل</label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="mb-3">
                <label class="form-label" for="password">کلمه عبور</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <!-- Checkbox -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31"/>
                <label class="form-check-label" for="form2Example31"> مرا بخاطر بسپار </label>
            </div>

            <!-- Submit button -->
            <button type="button" class="w-100 btn btn-primary mb-3">ورود</button>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-3">
                <div class="col d-flex justify-content-center">
                    <!-- Register buttons -->
                    <p>عضو نیستم؟ <a href="{{route('home.register.index')}}" class="text-decoration-none">ثبت نام</a></p>
                </div>

                <div class="col d-flex justify-content-center">
                    <!-- Simple link -->
                    <a href="#!" class="text-decoration-none">فراموشی پسورد؟</a>
                </div>
            </div>
        </form>
    </div>

@endsection
