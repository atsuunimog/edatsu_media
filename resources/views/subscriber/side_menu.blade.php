<div class="my-3 fs-9">
    <ul class="list-group">
        <a href={{route("subscriber.dashboard")}} class="text-decoration-none">
            <li class="d-inline-block d-flex justify-content-between list-group-item">
                <div>
                    <span class="material-symbols-outlined align-middle">
                    dashboard
                    </span>
                </div>
                <div>Dashboard</div>
            </li>
        </a>

        {{-- <a href={{route("subscriber.dashboard")}} class="text-decoration-none">
            <li class="d-inline-block d-flex justify-content-between list-group-item">
                <div>
                    <span class="material-symbols-outlined align-middle">
                        person
                    </span>
                </div>
                <div>Profile</div>
            </li>
        </a> --}}

        {{-- <a href={{route("subscriber.dashboard")}} class="text-decoration-none">
            <li class="d-inline-block d-flex justify-content-between list-group-item">
                <div>
                    <span class="material-symbols-outlined align-middle">
                    Notifications
                    </span>
                </div>
                <div>Notification</div>
            </li>
        </a> --}}

        <a href={{route("subscriber.bookmark")}} class="text-decoration-none">
            <li class="d-inline-block d-flex justify-content-between list-group-item">
                <div>
                    <span class="material-symbols-outlined align-middle">
                    bookmark
                    </span>
                </div>
                <div>Bookmark</div>
            </li>
        </a>

        <a href={{route("profile.edit")}} class="text-decoration-none">
            <li class="d-inline-block d-flex justify-content-between list-group-item">
                <div>
                    <span class="material-symbols-outlined align-middle">
                    settings
                    </span>
                </div>
                <div>Settings</div>
            </li>
        </a>

        <a href={{route("logout")}} class="text-decoration-none"
        onclick="event.preventDefault();   this.children[0].submit()">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <li class="d-inline-block d-flex justify-content-between list-group-item">
                <div>
                    <span class="material-symbols-outlined align-middle">
                    logout
                    </span>
                </div>
                <div>
                    Logout
                </div>
            </li>
            </form>
        </a>
      </ul>
</div>