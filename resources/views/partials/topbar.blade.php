<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ url('/admin') }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a>
        </div>
    </div>

    <div class="navbar navbar-default">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="md md-menu"></i>
                    </button>
                </div>
            
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li><a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a></li>
                    <li class="dropdown top-menu-item-xs">
                        <a href="#" class="profile waves-effect waves-light" data-toggle="dropdown"><img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                            <li><a href="#"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                            <li><a href="#"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>