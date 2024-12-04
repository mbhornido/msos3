<aside class="msos-sidebar">
    <h2>MSOS Super</h2>
    <nav>
        <ul>
            <li><a href="{{url('super_dashboard')}}"> <i class="fas fa-tachometer-alt"></i> Dashboard </a></li>
            <li class="msos-dropdown">
                <div class="msos-dropdown-toggle">
                    <div class="msos-drop-toggle-left">
                        <i class="fas fa-box"></i> 
                        <p>Global Settings</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="msos-dropdown-menu">
                    <li><a href="{{url('view_section')}}"><i class="fas fa-plus"></i> Sections </a></li>
                    <li><a href="{{url('view_ship')}}"><i class="fas fa-plus"></i> Shipping </a></li>
                    <li><a href="{{url('view_supercategory')}}"><i class="fas fa-plus"></i> Global Category </a></li>
                    <li><a href="{{url('view_department')}}"><i class="fas fa-plus"></i> Departments </a></li>
                    <li><a href="{{url('view_fee')}}"><i class="fas fa-plus"></i> Transaction Fee </a></li>
                
                </ul>
            </li>

            <li class="msos-dropdown">
                <div class="msos-dropdown-toggle">
                    <div class="msos-drop-toggle-left">
                        <i class="fas fa-user"></i>
                        <p>Manage Accounts</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="msos-dropdown-menu">
                    <li><a href="{{url('users')}}"><i class="fas fa-plus"></i> Manage User </a></li>
                    <li><a href="{{url('view_ship')}}"><i class="fas fa-plus"></i> Manage Admin </a></li>
        
                
                </ul>
            </li>


            <li class="msos-dropdown">
                <div class="msos-dropdown-toggle">
                    <div class="msos-drop-toggle-left">
                        <i class="fas fa-user"></i>
                        <p>Account Settings</p>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <ul class="msos-dropdown-menu">
                    <li><a href="{{url('profile')}}"><i class="fas fa-plus"></i> My profile </a></li>
                    <li><a href="{{url('view_ship')}}"><i class="fas fa-plus"></i> 
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
        
                        <input type="submit" value="
                        Logout" class="btn-1">
                    </form> </a></li>
        
                
                </ul>
            </li>


        </ul>
    </nav>
</aside>