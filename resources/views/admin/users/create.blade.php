@extends('layouts.admin')

@section('script')
@endsection

@section('content')
    <h5 class="font-weight-bold m-4">ایجاد کاربران </h5>

    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.users.store')}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="text" name="name" id="name" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">ایمیل</label>
                <input type="email" name="email" id="email" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">کلمه عبور</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="confirm-password">تکرار کلمه عبور</label>
                <input type="confirm-password" name="confirm-password" id="confirm-password" class="form-control" />
            </div>

            <button type="button" class="w-100 btn btn-primary mb-4">ثبت نام</button>

        </form>
    </div>


@endsection
