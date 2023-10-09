@extends('layouts.admin')

@section('script')
    <script type="module">
        $(function() {
            $('.select2').select2();
        });
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between m-4">
        <h5 class="font-weight-bold">ویرایش نقش </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.roles.index')}}">
            نمایش نقش ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.roles.edit' , ['role' => $role->id])}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="label">برچسب</label>
                <input type="text" name="label" id="label" value="{{$role->label}}" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="permission">مجوز دسترسی</label>
                <select class="form-select select2" name="permission" id="permission" multiple="multiple">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            <button type="button" class="w-100 btn btn-primary mb-4">ویرایش</button>

        </form>
    </div>

@endsection
