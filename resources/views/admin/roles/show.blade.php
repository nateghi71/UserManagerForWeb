@extends('layouts.admin')

@section('script')
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">نمایش نقش </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.roles.index')}}">
            نمایش نقش ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.roles.show' , ['role' => $role->id])}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control" disabled/>
            </div>

            <div class="mb-3">
                <label class="form-label" for="label">برچسب</label>
                <input type="text" name="label" id="label" value="{{$role->label}}" class="form-control" disabled />
            </div>

        </form>
    </div>

@endsection