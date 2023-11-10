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
        <h5 class="font-weight-bold">نمایش کاربر </h5>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.index')}}">
            نمایش کاربران
        </a>
    </div>
    <div class="m-5 d-flex justify-content-center">
        <form action="{{route('admin.users.show' , ['user' => $user->id])}}" method="post" class="w-50">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">نام</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" disabled/>
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">ایمیل</label>
                <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" disabled />
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">کلمه عبور</label>
                <input type="password" name="password" value="{{$user->password}}" id="password" class="form-control" disabled />
            </div>
\
            <div class="mb-3">
                <label class="form-label" for="role">کلمه عبور</label>
                <input type="text" name="role" value="{{1}}" id="role" class="form-control" disabled />
            </div>

            <div class="mb-3">
                <label class="form-label" for="role">نقش</label>
                <select class="form-select select2" name="role" id="role" disabled>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}"
                            {{in_array($role->id , $user->roles()->pluck('id')->toArray()) ? 'selected' : ''}}>
                            {{$role->label}}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

@endsection
