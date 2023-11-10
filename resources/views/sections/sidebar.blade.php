<aside class="js-fullHeight bg-light border-end">

    <h3 class="p-3 mb-3 bg-primary"><a href="#" class="text-decoration-none text-white"> داشبورد</a></h3>

    <ul class="list-unstyled pb-2 m-0">
        @can('viewAny' , App\Models\User::class)
        <li class="px-4 py-2">
            <a href="#user-menu" data-bs-toggle="collapse" class="text-decoration-none text-primary d-flex justify-content-between"> کاربران <span> + </span></a>
            <ul class="collapse list-unstyled" id="user-menu">
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.users.index')}}">کاربران</a> </li>
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.users.create')}}"> ایجاد کاربر</a> </li>
            </ul>
        </li>
        <hr>
        @endcan
        @can('viewAny' , App\Models\Permission::class)
        <li class="px-4 py-2">
            <a href="#permision-menu" data-bs-toggle="collapse" class="text-decoration-none text-primary d-flex justify-content-between"> مجوز دسترسی <span> + </span></a>
            <ul class="collapse list-unstyled" id="permision-menu">
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.permissions.index')}}">مجوزها</a> </li>
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.permissions.create')}}"> ایجاد مجوز</a> </li>
            </ul>
        </li>
        <hr>
        @endcan
        @can('viewAny' , App\Models\Role::class)
        <li class="px-4 py-2">
            <a href="#role-menu" data-bs-toggle="collapse" class="text-decoration-none text-primary d-flex justify-content-between"> نقش <span> + </span></a>
            <ul class="collapse list-unstyled" id="role-menu">
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.roles.index')}}">نقش ها</a> </li>
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.roles.create')}}"> ایجاد نقش</a> </li>
            </ul>
        </li>
        <hr>
        @endcan
        @can('viewAny' , App\Models\Post::class)
        <li class="px-4 py-2">
            <a href="#post-menu" data-bs-toggle="collapse" class="text-decoration-none text-primary d-flex justify-content-between"> نوشته <span> + </span></a>
            <ul class="collapse list-unstyled" id="post-menu">
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.posts.index')}}">نوشته ها</a> </li>
                <li class="mt-3 ps-3"><a class="text-decoration-none text-secondary" href="{{ route('admin.posts.create')}}"> ایجاد نوشته</a> </li>
            </ul>
        </li>
        @endcan
    </ul>
</aside>



