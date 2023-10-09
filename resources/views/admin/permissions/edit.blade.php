@extends('layouts.admin')

@section('script')
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">ویرایش مجوز </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.permissions.index')}}">
            نمایش مجوز ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.permissions.update' , ['permission' => $permission->id])}}" method="post" class="w-50">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="text" name="name" id="name" value="{{$permission->name}}" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="label">برچسب</label>
                <input type="text" name="label" id="label" value="{{$permission->label}}" class="form-control" />
            </div>

            <button type="submit" class="w-100 btn btn-primary mb-4">ویرایش</button>

        </form>
    </div>

@endsection
