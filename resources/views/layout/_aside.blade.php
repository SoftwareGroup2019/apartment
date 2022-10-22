<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="index.html">
                        <!-- <img src="images/logo.png" alt="" /> --><span>Focus</span></a></div>
                <li class="label">Main</li>
                <li><a href="/dashboard/home"><i class="ti-dashboard"></i> Dashboard </a></li>


                <li class="label">Apps</li>
                @if (Auth::user()->role->rolename == 'SuperAdmin' && Auth::user()->group->groupname == 'IT')
                <li><a href="/dashboard/user"><i class="ti-user"></i> User </a></li>
                <li><a href="/dashboard/role"><i class="ti-shield"></i> Role</a></li>
                <li><a href="/dashboard/group"><i class="ti-flag"></i> Group</a></li>
                <li><a href="/dashboard/ads"><i class="ti-announcement"></i> Advertisment</a></li>
                <li><a href="/dashboard/apartment"><i class="ti-home"></i> Apartments</a></li>
                <li><a href="/dashboard/service"><i class="ti-package"></i> Service</a></li>
                <li><a href="#"><i class="ti-shopping-cart"></i> Order</a></li>
                @elseif (Auth::user()->role->rolename == 'Group')
                <li><a href="/dashboard/user"><i class="ti-user"></i> User </a></li>
                <li><a href="/dashboard/ads"><i class="ti-announcement"></i> Advertisment</a></li>
                <li><a href="/dashboard/apartment"><i class="ti-home"></i> Apartments</a></li>
                <li><a href="/dashboard/service"><i class="ti-package"></i> Service</a></li>
                <li><a href="#"><i class="ti-shopping-cart"></i> Orders</a></li>
                @elseif (Auth::user()->role->rolename == 'Service')  
                <li><a href="#"><i class="ti-shopping-cart"></i> Orders</a></li>
                @endif

                

                <li><a><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->