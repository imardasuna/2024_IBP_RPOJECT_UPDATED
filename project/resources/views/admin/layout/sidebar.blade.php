<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="active"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/amenity/view') ? 'active':'' }}">
                        <a class="nav-link" href="{{ route('admin_amenity_view') }}"><i class="fas fa-angle-right"></i> Amenities</a></li>
                        
                    <li class="{{ Request::is('admin/room/view') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('admin_room_view') }}"><i class="fas fa-angle-right"></i> Rooms</a></li>
                </ul>
            </li>
            <li class=""><a class="nav-link" href="{{ route('admin_orders_view') }}"><i class="fas fa-hand-point-right"></i> <span>Reservations</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('admin_slide_view') }}"><i class="fas fa-hand-point-right"></i> <span>Slide</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('admin_feature_view') }}"><i class="fas fa-hand-point-right"></i> <span>Feature</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('admin_photo_view') }}"><i class="fas fa-hand-point-right"></i> <span>Photo</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('admin_availability_view') }}"><i class="fas fa-hand-point-right"></i> <span>Room Availability</span></a></li>

            

        </ul>
    </aside>
</div>