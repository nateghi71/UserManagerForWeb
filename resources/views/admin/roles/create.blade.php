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
        <h5 class="font-weight-bold">ایجادنقش </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.roles.index')}}">
            نمایش نقش ها
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.roles.store')}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="text" name="name" id="name" class="form-control"  />
            </div>

            <div class="mb-3">
                <label class="form-label" for="label">برچسب</label>
                <input type="text" name="label" id="label" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="permissions">مجوز دسترسی</label>
                <select class="form-select select2" name="permissions[]" id="permissions" multiple="multiple">
                    @foreach($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->label}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-100 btn btn-primary mb-4">ارسال</button>

        </form>
    </div>


@endsection
