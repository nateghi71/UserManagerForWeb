@extends('layouts.admin')

@section('script')
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">ایجاد مجوز </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.permissions.index')}}">
            نمایش مجوز ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.permissions.store')}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="text" name="name" id="name" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="label">برچسب</label>
                <input type="text" name="label" id="label" class="form-control" />
            </div>

            <button type="submit" class="w-100 btn btn-primary mb-4">ارسال</button>

        </form>
    </div>


@endsection
