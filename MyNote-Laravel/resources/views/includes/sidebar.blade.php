<div class="sidebar col-lg-2 z-1">
    <div class="container">
        <h1 class="mt-3 w-100 text-center">My Note</h1>

        <hr class="">

        <ul class="ps-0">
            <li class="d-flex"><a class="sidebar__item text-start btn w-100" href="{{ route('home') }}"><i class="fa-solid fa-house pe-2"></i>Home</a></li>
            <li class="d-flex "><a class="sidebar__item text-start btn w-100" href="{{ route('notes') }}"><i class="fa-solid fa-note-sticky pe-2"></i>Notes</a></li>
            <li class="d-flex "><a class="sidebar__item text-start btn w-100" href="{{ route('users') }}"><i class="fa-solid fa-user pe-2"></i>Users</a></li>
            <li class="d-flex "><a class="sidebar__item text-start btn w-100" href="{{ route('logout') }}"><i class="fa-solid fa-power-off pe-2"></i>Logout</a></li>
        </ul>
    </div>
</div>
