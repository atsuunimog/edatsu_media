<ul class='list-group fs-9 my-3 admin-side-menu'>
    <li class='list-group-item'><a href="{{route('admin.dashboard')}}" class='text-decoration-none'>Dashboard</a></li>
    <li class='list-group-item'><a href="{{route('admin.users')}}" class='text-decoration-none'>Users</a></li>
    <!-- <li class='list-group-item'><a href="{{route('admin.feeds.category')}}" class='text-decoration-none'>Feeds <span class="badge badge-danger fw-bold">Paused</span></a></li> -->
    <li class='list-group-item'>
        <a href="#" class="custom-collapse-toggle text-decoration-none">Posts <i class="fas fa-caret-right"></i></a>
        <ul class="custom-collapse-menu fs-9">
            <li class=''><a href="{{route('admin.opp')}}" class='text-decoration-none'>Opportunites</a></li>
            <li class=''><a href="{{route('admin.opp')}}" class='text-decoration-none'>All Posts</a></li>
            <!-- <li class=''><a href="{{route('admin.ev')}}" class='text-decoration-none'>Events</a></li> -->
            <li class=''><a href="{{route('admin.ev')}}" class='text-decoration-none'>Post Types</a></li>
            <li class=''><a href="{{route('admin.ev')}}" class='text-decoration-none'>Categories</a></li>
            <li class=''><a href="{{route('admin.ev')}}" class='text-decoration-none'>Brand Labels</a></li>
            <li class=''><a href="{{route('admin.ev')}}" class='text-decoration-none'>Tags</a></li>
        </ul>
    </li>
    <!-- <li class='list-group-item'><a href="{{route('admin.directory')}}" class='text-decoration-none'>Business Directory</a></li> -->
</ul>
